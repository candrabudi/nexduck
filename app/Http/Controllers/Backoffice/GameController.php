<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\AesEncryptionHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function index(Request $request)
    {
        try {
            $games = Game::all();
            return view('backend.games.index', compact('games'));
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function updateGame()
    {
        try {
            $providers = Provider::get();
    
            foreach ($providers as $pv) {
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->timeout(50000)->post('https://api.nexusggr.com', [
                    'method' => 'game_list',
                    'agent_code' => 'macan',
                    'agent_token' => '084bf19bc695e0c655dbc072b73a27c4',
                    'provider_code' => $pv->provider_code,
                ]);
    
                $res = $response->body();
                $decodes = json_decode($res, true);
    
                if (isset($decodes['games'])) {
                    foreach ($decodes['games'] as $dc) {
                        $c = Game::where('game_name', $dc['game_name'])
                            ->where('category_id', $pv->provider_id)
                            ->first();
    
                        if (!$c) {
                            $s = new Game();
                            $s->category_id = $pv->category_id;
                            $s->provider_id = $pv->id;
                            $s->game_code = $dc['game_code'];
                            $s->game_name = $dc['game_name'];
                            $s->game_image = $dc['banner'];
                            $s->game_status = $dc['status'];
                            $s->game_provider_code = $pv->provider_code;
                            $s->save();
                        } else {
                            $c->game_provider_code = $dc['game_code'];
                            $c->save();
                        }
                    }
                } else {
                    continue;
                }
            }
            return redirect()->back();
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function updateGameStatus(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'status' => 'required|in:0,1',
        ]);

        try {
            $game = Game::find($validated['game_id']);
            $game->game_status = $validated['status'];
            $game->save();

            return response()->json([
                'success' => true,
                'message' => 'Game status updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update game status!'
            ]);
        }
    }

    
}
