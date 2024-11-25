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
        if(!Auth::user()) {
            return redirect()->route('member');
        }
        
        $provider = Provider::where('provider_slug', $a)
            ->first();

        if (!$provider) {
            abort(404);
        }

        $games = Game::where('provider_id', $provider->id)
            ->get();
        
        $slots = Provider::where('provider_type', 'SLOT')
            ->where('provider_status', 1)
            ->get();

        return view('frontend.games.detail', compact('games', 'slots', 'provider'));
    }


    public function playGame($gameId)
    {
        if(!Auth::user()) {
            return redirect()->route('member');
        }
        try {
            $game = Game::where('id', $gameId)->first();
            if (!$game) {
                return redirect()->route('member');
            }

            $memberExt = MemberExt::where('user_id', Auth::user()->id)
                ->first();

                $postData = [
                    'method' => 'game_launch',
                    'agent_code' => env('NEXUS_AGENT_CODE'),
                    'agent_token' => env('NEXUS_AGENT_SIGNATURE'),
                    'user_code' => $memberExt->ext_name,
                    'game_code' => $game->game_code,
                    'provider_code' => $game->game_provider_code,
                    'lang' => 'en',
                ];

                $response = Http::post(env('NEXUS_URL'), $postData);
                $responseData = $response->json();

                if (isset($responseData['launch_url'])) {
                    return redirect()->away($responseData['launch_url']);
                }

                return redirect()->route('member')->with('error', 'Game URL not found');

        } catch (\Exception $e) {
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
