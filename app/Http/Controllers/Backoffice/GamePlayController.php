<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Provider;
use Illuminate\Http\Request;

class GamePlayController extends Controller
{
    // Function to render the main page with search filters
    public function index(Request $request)
    {
        // Get all providers for the filter dropdown
        $providers = Provider::all();

        // Return view for the initial page
        return view('backend.games.index', compact('providers'));
    }

    // Function to load the game data with pagination (AJAX request)
    public function loadData(Request $request)
    {
        // Query games, apply search and filter by provider
        $games = Game::with('provider');  // No need for query() here, just use the Eloquent model
    
        // Search by game name
        if ($request->has('search') && $request->search != '') {
            $games = $games->where('game_name', 'like', '%' . $request->search . '%');
        }
    
        // Filter by provider
        if ($request->has('provider') && $request->provider != '') {
            $games = $games->where('provider_id', $request->provider);
        }
    
        // Paginate the games
        $perPage = 10; // Number of items per page
        $games = $games->paginate($perPage);
    
        // Return response as JSON with the table data and pagination
        return response()->json([
            'games' => $games->items(),  // Return the game items as an array
            'pagination' => [
                'current_page' => $games->currentPage(),
                'last_page' => $games->lastPage(),
                'per_page' => $games->perPage(),
                'total' => $games->total(),
            ]
        ]);
    }
    

}
