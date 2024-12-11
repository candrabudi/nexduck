<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApiCredential;
use App\Models\Game;
use App\Models\LogGameActivity;
use App\Models\Member;
use App\Models\MemberExt;
use App\Models\Provider;
use App\Models\ProviderApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;
class GameController extends Controller
{
    public function slot()
    {
        $games = Game::join('providers as pv', 'pv.id', '=', 'games.provider_id')
            ->select('games.*')
            ->where('pv.provider_type', 'slot')
            ->limit(54)
            ->orderBy('games.id', 'desc')
            ->get();
        $slots = Provider::get();
        return view('frontend.slot', compact('games', 'slots'));
    }

    public function casino()
    {
        $games = Game::join('providers as pv', 'pv.id', '=', 'games.provider_id')
            ->select('games.*')
            ->where('pv.provider_type', 'live')
            ->limit(54)
            ->orderBy('games.id', 'desc')
            ->get();

        $slots = Provider::where('provider_type', 'live')
            ->get();


        return view('frontend.slot', compact('games', 'slots'));
    }


    public function loadMoreGames(Request $request)
    {
        $offset = $request->offset;
        $provider_id = $request->provider_id;

        $games = Game::when($provider_id, function ($query) use ($provider_id) {
            return $query->where('provider_id', $provider_id);
        })->skip($offset)->take(50)->get();

        return response()->json(['games' => $games]);
    }

    public function searchGames(Request $request)
    {
        $query = $request->query('query');
        $provider_id = $request->provider_id;
        $offset = $request->offset ?? 0;
        $limit = $request->limit ?? 20;
    
        if ($query) {
            $query = ucwords(strtolower($query));
        }
    
        $games = Game::when($query, function ($q) use ($query) {
            return $q->where('game_name', 'like', '%' . $query . '%');
        })
            ->when($provider_id, function ($q) use ($provider_id) {
                return $q->where('provider_id', $provider_id);
            })
            ->skip($offset) // Skip games based on offset
            ->take($limit) // Limit the number of games fetched
            ->get();
    
        return response()->json(['games' => $games]);
    }
    



    public function detail($a)
    {
        if (!Auth::user()) {
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
        if (!Auth::user()) {
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
                $agent = new Agent();
                $browser = $agent->browser();
                $platform = $agent->platform();

                $browserInfo = $browser . ' - ' . $platform;

                LogGameActivity::create([
                    'user_id' => Auth::user()->id,
                    'provider_id' => $game->provider_id,
                    'game_id' => $game->id,
                    'ip_address' => request()->ip(),
                    'browser' => $browserInfo,
                ]);

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
