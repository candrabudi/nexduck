<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\ClaimPromotion;
use App\Models\Game;
use App\Models\Member;
use App\Models\MemberBalance;
use App\Models\MemberExt;
use App\Models\Promotion;
use App\Models\PromotionDetail;
use App\Models\Provider;
use App\Models\SeoSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                    ->get()
                    ->map(function ($game) {
                        // Generate dynamic gradient colors for each game
                        $game->start_color = '#' . substr(md5($game->id), 0, 6);
                        $game->end_color = '#' . substr(md5($game->id * 2), 0, 6);
                        return $game;
                    });

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

        cache()->forget('slots');
        cache()->forget('casinos');
        cache()->forget('providers_with_games');

        return view('frontend.home', compact('slots', 'casinos', 'providers', 'banners'));
    }

    public function getPromotionProgress($userId)
    {
        $claimPromotion = ClaimPromotion::where('user_id', $userId)
            ->where('status', 0)
            ->first();

        if (!$claimPromotion) {
            return response()->json([
                'message' => 'No active promotion found for this user.',
            ], 404);
        }

        $promotion = Promotion::where('id', $claimPromotion->promotion_id)
            ->first();

        if ($promotion->promotion_type == "winover") {

            $user = Auth::user();

            $postData = [
                'method' => 'money_info',
                'agent_code' => env('NEXUS_AGENT_CODE'),
                'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                'user_code' => $user->memberExt->ext_name,
            ];
            $response = Http::post(env('NEXUS_URL'), $postData);
            if ($response->successful()) {
                $data = json_decode($response->body(), true);

                if (isset($data['status']) && $data['status'] == 1 && isset($data['user']['balance'])) {
                    MemberBalance::where('user_id', $user->id)
                        ->update([
                            'main_balance' => $data['user']['balance'],
                        ]);

                    $claimPromotion->current_target = $data['user']['balance'];
                    $claimPromotion->save();
                }
            }


        } else {

            $nowIndonesia = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');

            $totalBetMoney = 0;
            $page = 0;
            $allGameData = [];

            do {
                $postData = [
                    'method' => 'get_game_log',
                    'agent_code' => env('NEXUS_AGENT_CODE'),
                    'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                    'user_code' => Auth::user()->memberExt->ext_name,
                    'game_type' => 'slot',
                    'start' => $claimPromotion->updated_at,
                    'end' => $nowIndonesia,
                    'page' => $page,
                    'perPage' => 1000
                ];
                $response = Http::post(env('NEXUS_URL'), $postData);
                if ($response->successful()) {
                    $data = $response->json();

                    if (isset($data['slot']) && is_array($data['slot']) && !empty($data['slot'])) {
                        $allGameData = array_merge($allGameData, $data['slot']);

                        foreach ($data['slot'] as $game) {
                            $totalBetMoney += $game['bet_money'];

                            $existingHistory = DB::table('game_histories')->where('history_id', $game['history_id'])->first();

                            if (!$existingHistory) {
                                DB::table('game_histories')->insert([
                                    'history_id' => $game['history_id'],
                                    'agent_code' => $game['agent_code'],
                                    'user_code' => $game['user_code'],
                                    'provider_code' => $game['provider_code'],
                                    'game_code' => $game['game_code'],
                                    'type' => $game['type'],
                                    'bet_money' => $game['bet_money'],
                                    'win_money' => $game['win_money'],
                                    'txn_id' => $game['txn_id'],
                                    'txn_type' => $game['txn_type'],
                                    'user_start_balance' => $game['user_start_balance'],
                                    'user_end_balance' => $game['user_end_balance'],
                                    'agent_start_balance' => $game['agent_start_balance'],
                                    'agent_end_balance' => $game['agent_end_balance'],
                                    'created_at' => Carbon::parse($game['created_at']),
                                    'updated_at' => Carbon::now(),
                                ]);
                            }
                        }
                        $page++;
                    } else {
                        break;
                    }
                } else {
                    return response()->json([
                        'error' => 'Failed to retrieve game history',
                        'details' => $response->body()
                    ], $response->status());
                }

            } while (!empty($data['slot']));
            $claimPromotion->current_target = $totalBetMoney;
            $claimPromotion->save();
        }

        return response()->json([
            'promotion' => $claimPromotion,
            'progress' => $claimPromotion->current_target > 0 ? min(($claimPromotion->current_target / $claimPromotion->target) * 100, 100) : 0
        ]);
    }

    public function getHistoryGame()
    {
        $claimPromotion = ClaimPromotion::where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->first();

        if (!$claimPromotion) {
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Tidak ada promosi berjalan'
            ]);
        }

        $promotion = Promotion::where('id', $claimPromotion->promotion_id)
            ->first();

        if ($promotion->promotion_type == "winover") {

            $user = Auth::user();

            $postData = [
                'method' => 'money_info',
                'agent_code' => env('NEXUS_AGENT_CODE'),
                'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                'user_code' => $user->memberExt->ext_name,
            ];

            try {
                $response = Http::post(env('NEXUS_URL'), $postData);
                if ($response->successful()) {
                    $data = json_decode($response->body(), true);

                    if (isset($data['status']) && $data['status'] == 1 && isset($data['user']['balance'])) {
                        MemberBalance::where('user_id', $user->id)
                            ->update([
                                'main_balance' => $data['user']['balance'],
                            ]);

                        return response()->json([
                            'status' => 'success',
                            'code' => 200,
                            'message' => 'Ada promosi berjalan berjenis winover',
                            'data' => $claimPromotion
                        ]);
                    } else {
                        return response()->json([
                            'status' => 0,
                            'msg' => 'Balance not available or invalid response from API.',
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 0,
                        'msg' => 'Failed to fetch data from API.',
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 0,
                    'msg' => 'An error occurred: ' . $e->getMessage(),
                ]);
            }

        } else {

            $nowIndonesia = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');

            $totalBetMoney = 0;
            $page = 0;
            $allGameData = [];

            do {
                $postData = [
                    'method' => 'get_game_log',
                    'agent_code' => env('NEXUS_AGENT_CODE'),
                    'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                    'user_code' => Auth::user()->memberExt->ext_name,
                    'game_type' => 'slot',
                    'start' => $claimPromotion->updated_at,
                    'end' => $nowIndonesia,
                    'page' => $page,
                    'perPage' => 1000
                ];
                $response = Http::post(env('NEXUS_URL'), $postData);
                if ($response->successful()) {
                    $data = $response->json();

                    if (isset($data['slot']) && is_array($data['slot']) && !empty($data['slot'])) {
                        $allGameData = array_merge($allGameData, $data['slot']);

                        foreach ($data['slot'] as $game) {
                            $totalBetMoney += $game['bet_money'];

                            $existingHistory = DB::table('game_histories')->where('history_id', $game['history_id'])->first();

                            if (!$existingHistory) {
                                DB::table('game_histories')->insert([
                                    'history_id' => $game['history_id'],
                                    'agent_code' => $game['agent_code'],
                                    'user_code' => $game['user_code'],
                                    'provider_code' => $game['provider_code'],
                                    'game_code' => $game['game_code'],
                                    'type' => $game['type'],
                                    'bet_money' => $game['bet_money'],
                                    'win_money' => $game['win_money'],
                                    'txn_id' => $game['txn_id'],
                                    'txn_type' => $game['txn_type'],
                                    'user_start_balance' => $game['user_start_balance'],
                                    'user_end_balance' => $game['user_end_balance'],
                                    'agent_start_balance' => $game['agent_start_balance'],
                                    'agent_end_balance' => $game['agent_end_balance'],
                                    'created_at' => Carbon::parse($game['created_at']),
                                    'updated_at' => Carbon::now(),
                                ]);
                            }
                        }
                        $page++;
                    } else {
                        break;
                    }
                } else {
                    return response()->json([
                        'error' => 'Failed to retrieve game history',
                        'details' => $response->body()
                    ], $response->status());
                }

            } while (!empty($data['slot']));
            $claimPromotion->current_target = $totalBetMoney;
            $claimPromotion->save();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Ada promosi berjalan berjenis turnover',
                'data' => $claimPromotion
            ]);
        }

    }

    public function updateHistoryGame()
    {
        $memberExts = MemberExt::all();

        foreach ($memberExts as $memberExt) {

            $claimPromotion = ClaimPromotion::where('user_id', Auth::user()->id)
                ->where('status', 1)
                ->first();

            $nowIndonesia = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');

            $totalBetMoney = 0;
            $page = 0;
            $allGameData = [];

            do {
                $postData = [
                    'method' => 'get_game_log',
                    'agent_code' => env('NEXUS_AGENT_CODE'),
                    'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                    'user_code' => $memberExt->ext_name,
                    'game_type' => 'slot',
                    'start' => $claimPromotion->updated_at,
                    'end' => $nowIndonesia,
                    'page' => $page,
                    'perPage' => 1000
                ];
                $response = Http::post(env('NEXUS_URL'), $postData);
                if ($response->successful()) {
                    $data = $response->json();

                    if (isset($data['slot']) && is_array($data['slot']) && !empty($data['slot'])) {
                        $allGameData = array_merge($allGameData, $data['slot']);

                        foreach ($data['slot'] as $game) {
                            $totalBetMoney += $game['bet_money'];

                            $existingHistory = DB::table('game_histories')->where('history_id', $game['history_id'])->first();

                            if (!$existingHistory) {
                                DB::table('game_histories')->insert([
                                    'history_id' => $game['history_id'],
                                    'agent_code' => $game['agent_code'],
                                    'user_code' => $game['user_code'],
                                    'provider_code' => $game['provider_code'],
                                    'game_code' => $game['game_code'],
                                    'type' => $game['type'],
                                    'bet_money' => $game['bet_money'],
                                    'win_money' => $game['win_money'],
                                    'txn_id' => $game['txn_id'],
                                    'txn_type' => $game['txn_type'],
                                    'user_start_balance' => $game['user_start_balance'],
                                    'user_end_balance' => $game['user_end_balance'],
                                    'agent_start_balance' => $game['agent_start_balance'],
                                    'agent_end_balance' => $game['agent_end_balance'],
                                    'created_at' => Carbon::parse($game['created_at']),
                                    'updated_at' => Carbon::now(),
                                ]);
                            }
                        }
                        $page++;
                    } else {
                        break;
                    }
                } else {
                    return response()->json([
                        'error' => 'Failed to retrieve game history',
                        'details' => $response->body()
                    ], $response->status());
                }

            } while (!empty($data['slot']));
            if ($claimPromotion->promotion->provider_category == "slot" && $claimPromotion->promotion->type == "slot") {
                $claimPromotion->current_target = $totalBetMoney;
                $claimPromotion->save();
            }
        }
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
                    MemberBalance::where('user_id', $user->id)
                        ->update([
                            'main_balance' => $data['user']['balance'],
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
    }

    public function getSeoSetting()
    {
        $seoSettings = SeoSetting::first(); // Ambil data SEO pertama

        if ($seoSettings) {
            return response()->json([
                'success' => true,
                'data' => $seoSettings
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'SEO settings not found.'
            ]);
        }
    }

}
