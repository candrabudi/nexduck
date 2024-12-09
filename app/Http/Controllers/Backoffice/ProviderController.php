<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\AesEncryptionHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\Provider;
use App\Models\ProviderApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
    public function index(Request $request)
    {
        try {
            $providers = Provider::all();
            return view('backend.provider.index', compact('providers'));
        } catch (\Exception $e) {
            abort(413);
        }
    }

    public function updateProvider()
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(5)->post('https://api.nexusggr.com', [
                        'method' => 'provider_list',
                        'agent_code' => 'ducduc',
                        'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
                    ]);

            $res = $response->body();
            $decodes = json_decode($res, true); // Decode JSON
            DB::beginTransaction();

            foreach ($decodes['providers'] as $dc) {
                Provider::updateOrCreate(
                    ['provider_code' => $dc['code']],
                    [
                        'provider_name' => $dc['name'],
                        'provider_slug' => Str::slug(strtolower($dc['name'])),
                        'provider_type' => $dc['type'],
                        'provider_position' => 0,
                        'provider_image' => null,
                        'provider_status' => $dc['status'] ?? 0,
                    ]
                );
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error('Update Provider Error: ', ['error' => $e->getMessage()]);
        }
    }

    public function updateGame()
    {
        try {
            $providers = Provider::where('provider_status', 1)
                ->get();

            foreach ($providers as $pv) {

                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->timeout(5)->post('https://api.nexusggr.com', [
                            'method' => 'game_list',
                            'agent_code' => 'ducduc',
                            'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
                            'provider_code' => $pv->provider_code
                        ]);

                $res = $response->body();
                $decodes = json_decode($res, true);
                DB::beginTransaction();
                if (isset($decodes['games'])) {
                    foreach ($decodes['games'] as $dc) {
                        Game::updateOrCreate(
                            ['game_code' => $dc['game_code']],
                            [
                                'provider_id' => $pv->id,
                                'game_provider_code' => $pv->provider_code,
                                'game_name' => $dc['game_name'],
                                'game_code' => $dc['game_code'],
                                'game_image' => $dc['banner'],
                                'game_status' => $dc['status'],
                            ]
                        );
                        DB::commit();
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error('Update Provider Error: ', ['error' => $e->getMessage()]);
        }
    }

}
