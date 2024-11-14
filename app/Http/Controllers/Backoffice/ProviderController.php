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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Tambahkan ini jika belum

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
                        'agent_code' => 'macan',
                        'agent_token' => '084bf19bc695e0c655dbc072b73a27c4',
                    ]);

            $res = $response->body();
            $decodes = json_decode($res, true);

            foreach ($decodes['providers'] as $dc) {
                $category = Category::where('category_name', $dc['type'])->first();
                if (!$category) {
                    $category = new Category();
                    $category->category_name = $dc['type'];
                    $category->status = 1;
                    $category->save();
                    $category->fresh();
                }

                $c = Provider::where('provider_name', $dc['name'])
                    ->where('category_id', $category->id)
                    ->first();

                if (!$c) {
                    if ($category) {
                        $s = new Provider();
                        $s->category_id = $category->id;
                        $s->provider_code = $dc['code'];
                        $s->provider_name = $dc['name'];
                        $s->provider_slug = Str::slug($dc['name']);
                        $s->provider_image = $dc['image']; // Menangani image
                        $s->provider_icon = $dc['icon']; // Menangani icon
                        $s->provider_icon_nav = $dc['icon_nav']; // Menangani icon navigasi
                        $s->provider_status = $dc['status'];
                        $s->save();
                    }
                } else {
                    $c->provider_code = $dc['code'];
                    $c->provider_image = $dc['image']; // Update image
                    $c->provider_icon = $dc['icon']; // Update icon
                    $c->provider_icon_nav = $dc['icon_nav']; // Update icon navigasi
                    $c->save();
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        try {
            $provider = Provider::find($request->provider_id);
            $provider->provider_name = $request->provider_name;
            $provider->provider_slug = $request->provider_slug;
            $provider->provider_status = $request->provider_status;

            if ($request->hasFile('provider_image')) {
                $providerImagePath = $request->file('provider_image')->store('public/provider_images');
                $provider->provider_image = asset(Storage::url($providerImagePath));
            }

            if ($request->hasFile('provider_icon')) {
                $providerIconPath = $request->file('provider_icon')->store('public/provider_icons');
                $provider->provider_icon = asset(Storage::url($providerIconPath));
            }

            if ($request->hasFile('provider_icon_nav')) {
                $providerIconNavPath = $request->file('provider_icon_nav')->store('public/provider_icons_nav');
                $provider->provider_icon_nav = asset(Storage::url($providerIconNavPath));
            }

            $provider->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function createOrUpdateProviderApiNexus()
    {
        $postData = [
            'method' => 'provider_list',
            'agent_code' => 'ducduc',
            'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
        ];

        $response = Http::post('https://api.nexusggr.com', $postData);

        if ($response->successful()) {
            $data = $response->json();
            foreach ($data['providers'] as $provider) {
                $providerRecord = Provider::where('provider_name', 'LIKE', '%' . $provider['name'] . '%')->first();

                if ($providerRecord) {
                    // return $providerRecord;
                    $providerApi = ProviderApi::updateOrCreate(
                        [
                            'provider_code' => $provider['code'],
                            'category_id' => $providerRecord->category_id,
                        ],
                        [
                            'api_credential_id' => 1,
                            'category_id' => $providerRecord->category_id,
                            'provider_id' => $providerRecord->id,
                            'provider_name' => $provider['name'],
                            'provider_code' => $provider['code'],
                            'provider_status' => $provider['status'],
                            'provider_type' => $provider['type'] == "slot" ? "SL" : "LC",
                        ]
                    );
                } else {
                    // return $provider;
                    continue;
                }
            }

            return $data['providers'];
        } else {
            return response()->json([
                'error' => 'Failed to fetch data from the API.',
                'message' => $response->body(),
            ], $response->status());
        }
    }

    public function createOrUpdateGameApiNexus()
    {
        $providerApis = ProviderApi::where('api_credential_id', 1)
            ->get();

        foreach ($providerApis as $pa) {
            $postData = [
                'method' => 'game_list',
                'agent_code' => 'ducduc',
                'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
                'provider_code' => $pa->provider_code
            ];

            $response = Http::post('https://api.nexusggr.com', $postData);
            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['games'])) {

                    foreach ($data['games'] as $game) {
                        // return $pa;
                        $providerApi = Game::updateOrCreate(
                            [
                                'game_code' => $game['game_code'],
                                'api_credential_id' => 1,
                                'category_id' => $pa->category_id,
                            ],
                            [
                                'category_id' => $pa->category_id,
                                'api_credential_id' => 1,
                                'provider_id' => $pa->provider_id,
                                'provider_api_id' => $pa->id,
                                'game_provider_code' => $pa->provider_code,
                                'game_code' => $game['game_code'],
                                'game_name' => $game['game_name'],
                                'game_status' => $game['status'],
                                'game_image' => $game['banner'],
                            ]
                        );
                    }
                }

                continue;
            } else {
                return response()->json([
                    'error' => 'Failed to fetch data from the API.',
                    'message' => $response->body(),
                ], $response->status());
            }
        }
    }


    public function getProviderListSG()
    {
        $url = 'https://api.smlss.fun/v2/GetProviderList.aspx';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer YOUR_API_KEY',
            'Accept' => 'application/json',
        ])->get($url, [
                    'agent_code' => 'rhoSDLl7s1',
                    'signature' => '9a968bb123801526399e0955ac1b6855',
                ]);

        // if ($response->successful()) {
        $data = $response->json();
        // return $data;
        foreach ($data['providerlist'] as $provider) {
            $providerRecord = Provider::where('provider_name', 'LIKE', '%' . $provider['provider_name'] . '%')->first();

            if ($providerRecord) {
                if ($provider['provider_type'] == "SL" || $provider['provider_type'] == "LC") {
                    $providerApi = ProviderApi::updateOrCreate(
                        [
                            'provider_code' => $provider['provider_code'],
                            'api_credential_id' => 2,
                            'category_id' => $providerRecord->category_id
                        ],
                        [
                            'category_id' => $providerRecord->category_id,
                            'api_credential_id' => 2,
                            'provider_id' => $providerRecord->id,
                            'provider_name' => $provider['provider_name'],
                            'provider_code' => $provider['provider_code'],
                            'provider_status' => $provider['provider_status'],
                            'provider_type' => $provider['provider_type'] == "SL" ? "SL" : "LC",
                        ]
                    );
                } else {
                    return $provider;
                }
            }
        }
        // }

        // return response()->json([
        //     'error' => 'Failed to fetch data from the API.',
        //     'message' => $response->body(),
        // ], $response->status());
    }

    public function createOrUpdateGameApiSG()
    {
        $providerApis = ProviderApi::where('api_credential_id', 2)
            ->get();

        foreach ($providerApis as $pa) {
            $url = 'https://api.smlss.fun/v2/GetGameList.aspx';

            $response = Http::withHeaders([
                'Authorization' => 'Bearer YOUR_API_KEY',
                'Accept' => 'application/json',
            ])->get($url, [
                        'agent_code' => 'rhoSDLl7s1',
                        'signature' => '9a968bb123801526399e0955ac1b6855',
                        'provider_code' => $pa->provider_code
                    ]);

            $data = $response->json();

            if (isset($data['gamelist'])) {
                foreach ($data['gamelist'] as $game) {
                    // return $pa;
                    $providerApi = Game::updateOrCreate(
                        [
                            'game_code' => $game['game_code'],
                            'api_credential_id' => 2,
                            'category_id' => $pa->category_id,
                        ],
                        [
                            'category_id' => $pa->category_id,
                            'api_credential_id' => 2,
                            'provider_id' => $pa->provider_id,
                            'provider_api_id' => $pa->id,
                            'game_provider_code' => $pa->provider_code,
                            'game_code' => $game['game_code'],
                            'game_name' => $game['game_name'],
                            'game_status' => $game['game_status'],
                            'game_image' => $game['game_image'],
                        ]
                    );
                }
            }

        }
    }

}
