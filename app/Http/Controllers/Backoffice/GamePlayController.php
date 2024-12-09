<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Provider;
use Illuminate\Http\Request;

class GamePlayController extends Controller
{
    public function index(Request $request)
    {
        $providers = Provider::all();

        return view('backend.games.index', compact('providers'));
    }

    public function loadData(Request $request)
    {
        $games = Game::with('provider');
    
        if ($request->has('search') && $request->search != '') {
            $games = $games->where('game_name', 'like', '%' . $request->search . '%');
        }
    
        if ($request->has('provider') && $request->provider != '') {
            $games = $games->where('provider_id', $request->provider);
        }
    
        $perPage = 10;
        $games = $games->paginate($perPage);
    
        return response()->json([
            'games' => $games->items(),
            'pagination' => [
                'current_page' => $games->currentPage(),
                'last_page' => $games->lastPage(),
                'per_page' => $games->perPage(),
                'total' => $games->total(),
            ]
        ]);
    }
    

}
