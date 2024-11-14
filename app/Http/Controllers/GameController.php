<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApiCredential;
use App\Models\Game;
use App\Models\Member;
use App\Models\MemberExt;
use App\Models\Provider;
use App\Models\ProviderApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function detail($a)
    {
        $provider = Provider::where('provider_slug', $a)
            ->first();

        if (!$provider) {
            abort(404);
        }

        $games = Game::where('api_credential_id', $provider->api_credential_id)
            ->where('provider_id', $provider->id)
            ->where('category_id', $provider->category_id)
            ->get();

        $slots = Provider::where('category_id', 1)
            ->where('provider_status', 1)
            ->get();

        return view('frontend.games.detail', compact('games', 'slots', 'provider'));
    }


    public function playGame($gameId)
    {
        try {
            $game = Game::where('id', $gameId)->first();
            if (!$game) {
                return redirect()->route('member');
            }

            $apiCredential = ApiCredential::where('id', $game->api_credential_id)->first();
            if (!$apiCredential) {
                return redirect()->route('member');
            }

            $memberExt = MemberExt::where('api_credential_id', $game->api_credential_id)
                ->where('user_id', Auth::user()->id)
                ->first();

            if ($apiCredential->agent_type === "sg") {
                $url = $apiCredential->agent_url . 'OpenGame.aspx';

                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                ])->get($url, [
                            'agent_code' => $apiCredential->agent_code,
                            'signature' => $apiCredential->agent_signature,
                            'username' => $memberExt->ext_name,
                            'gameid' => $game->game_code
                        ]);

                $responseData = $response->json();
                if (isset($responseData['gameUrl'])) {
                    $cleanUrl = $this->extractGameUrl($responseData['gameUrl']);
                    return redirect()->away($cleanUrl);
                }
                return redirect()->route('member')->with('error', 'Game URL not found');
            }
            if ($apiCredential->agent_type === "nexus") {
                $memberUpdateSaldo = Member::where('user_id', Auth::user()->id)
                        ->first();
                $providerApi = ProviderApi::where('id', $game->provider_api_id)->first();

                $credSG = ApiCredential::where('agent_type', 'sg')
                    ->first();

                $urlGetBalanceSG = $credSG->agent_url . 'GetBalance.aspx';

                $responseGetBalanceSG = Http::withHeaders([
                    'Accept' => 'application/json',
                ])->get($urlGetBalanceSG, [
                            'agent_code' => $credSG->agent_code,
                            'signature' => $credSG->agent_signature,
                            'username' => $memberExt->ext_name,
                        ]);

                $dataGetBalance = $responseGetBalanceSG->json();
                $balanceSG = $dataGetBalance['user']['balance'];

                $memberExtSG = MemberExt::where('api_credential_id', $credSG->id)
                        ->where('user_id', Auth::user()->id)
                        ->first();

                if($memberExtSG->balance != 0) {
                    $memberExtSG->balance = 0;
                    $memberExtSG->save();
    
                    $memberUpdateSaldo->balance = $balanceSG;
                    $memberUpdateSaldo->save();
                }

                $urlWithdrawSG = $credSG->agent_url . 'MakeTransaction.ashx';

                Http::withHeaders([
                    'Accept' => 'application/json',
                ])->get($urlWithdrawSG, [
                            'agent_code' => $credSG->agent_code,
                            'signature' => $credSG->agent_signature,
                            'username' => $memberExt->ext_name,
                            'amount' => $balanceSG,
                            'type' => 'withdraw'
                        ]);


                $memberExtNexus = MemberExt::where('api_credential_id', $providerApi->id)
                    ->where('user_id', Auth::user()->id)
                    ->first();
                if($memberExtNexus->balance == 0) {
                    $postDataDeposit = [
                        'method' => 'user_deposit',
                        'agent_code' => $apiCredential->agent_code,
                        'agent_token' => $apiCredential->agent_signature,
                        'user_code' => $memberExt->ext_name,
                        'amount' => (int)$memberUpdateSaldo->balance,
                    ];
    
                    Http::post($apiCredential->agent_url, $postDataDeposit);   
                }

                $postDataGetBalanceNexus = [
                    'method' => 'money_info',
                    'agent_code' => $apiCredential->agent_code,
                    'agent_token' => $apiCredential->agent_signature,
                    'user_code' => $memberExt->ext_name,
                ];

                $resDataBalanceNexus = Http::post($apiCredential->agent_url, $postDataGetBalanceNexus);   

                $memberExtNexus->balance = $resDataBalanceNexus['user']['balance'];
                $memberExtNexus->save();

                $memberUpdateSaldo->balance = $memberExtNexus->balance;
                $memberUpdateSaldo->save();

                $postData = [
                    'method' => 'game_launch',
                    'agent_code' => $apiCredential->agent_code,
                    'agent_token' => $apiCredential->agent_signature,
                    'user_code' => $memberExt->ext_name,
                    'game_code' => $game->game_code,
                    'provider_code' => $providerApi->provider_code,
                    'lang' => 'en',
                ];

                $response = Http::post($apiCredential->agent_url, $postData);
                $responseData = $response->json();

                if (isset($responseData['launch_url'])) {
                    return redirect()->away($responseData['launch_url']);
                }

                return redirect()->route('member')->with('error', 'Game URL not found');
            }

            return redirect()->route('member');
        } catch (\Exception $e) {
            return $e->getMessage();
            return redirect()->route('member')->with('error', $e->getMessage());
        }
    }

    private function extractGameUrl($gameUrl)
    {
        if (preg_match('/https:\/\/direct\.smlss\.fun\/gs2c\/opengame\.do\?session=[^&]+/', $gameUrl, $matches)) {
            return $matches[0];
        }
        return $gameUrl;
    }

}
