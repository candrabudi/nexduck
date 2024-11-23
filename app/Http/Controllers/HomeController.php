<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Game;
use App\Models\Member;
use App\Models\Provider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $slots = cache()->remember('slots', 60, function () {
            return Provider::where('provider_type', 'SLOT')
                ->where('provider_status', 1)
                ->get();
        });

        $casinos = cache()->remember('casinos', 60, function () {
            return Provider::where('provider_type', 'LIVE')
                ->where('provider_status', 1)
                ->get();
        });

        $providers = cache()->remember('providers_with_games', 60, function () {
            $qpv = Provider::where('provider_status', 1)
                ->get();

            $providers = $qpv->map(function ($pv) {
                $games = Game::where('provider_id', $pv->id)
                    ->take(20)
                    ->get();

                return [
                    'provider_name' => $pv->provider_name,
                    'provider_slug' => $pv->provider_slug,
                    'games' => $games,
                ];
            });

            return $providers;
        });

        $banners = Banner::where('banner_status', 1)
            ->get();

        return view('frontend.home', compact('slots', 'casinos', 'providers', 'banners'));
    }


    public function getBall()
    {
        $user = Auth::user();

        // Persiapkan data untuk request API
        $postData = [
            'method' => 'money_info',
            'agent_code' => env('NEXUS_AGENT_CODE'),
            'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
            'user_code' => $user->memberExt->ext_name,
        ];

        try {
            // Kirim request ke API
            $response = Http::post(env('NEXUS_URL'), $postData);

            // Periksa apakah response berhasil
            if ($response->successful()) {
                // Decode data response
                $data = json_decode($response->body(), true);

                // Periksa apakah struktur data valid
                if (isset($data['status']) && $data['status'] == 1 && isset($data['user']['balance'])) {
                    // Update saldo di database
                    Member::where('user_id', $user->id)
                        ->update([
                            'balance' => $data['user']['balance'],
                        ]);

                    return response()->json($data);
                } else {
                    return response()->json([
                        'status' => 0,
                        'msg' => 'Balance not available or invalid response from API.',
                    ]);
                }
            } else {
                // Jika request API gagal
                return response()->json([
                    'status' => 0,
                    'msg' => 'Failed to fetch data from API.',
                ]);
            }
        } catch (\Exception $e) {
            // Tangani error jika terjadi exception
            return response()->json([
                'status' => 0,
                'msg' => 'An error occurred: ' . $e->getMessage(),
            ]);
        }


        // $response = Http::get('https://cdn.databerjalan.com/games/pragmatic-slots');

        // if ($response->successful()) {
        //     // Akses body responsenya
        //     $data = json_decode($response->body(), true);
        //     foreach($data as $d) {

        //         Game::where('game_code', $d['brandUid'])
        //             ->update([
        //                 'game_image' => $d['logo']
        //             ]);
        //         }
        //         return $data;
        // } else {
        //     // Jika request gagal
        //     dd('Request failed: ' . $response->status());
        // }
        
    }

}
