<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion; // Pastikan model sesuai dengan database Anda

class PromotionController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $promotions = Promotion::all(); // Atau gunakan pagination seperti ->paginate(10)
        
        return view('frontend.promotion.index', compact('promotions'));
    }

    public function show($a)
    {

        $postArray = [
            'method' => 'game_list', 
            'agent_code' => 'ducduc', 
            'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
            'provider_code' => 'PRAGMATIC'
        ];
        $jsonData = json_encode($postArray);
    
        $headerArray = ['Content-Type: application/json'];
        
        $promotion = Promotion::where('slug', $a)
            ->first();

        return view('frontend.promotion.show', compact('promotion'));
    }
}
