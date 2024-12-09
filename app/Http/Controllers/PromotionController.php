<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        
        return view('frontend.promotion.index', compact('promotions'));
    }

    public function show($a)
    {
        $promotion = Promotion::where('slug', $a)->firstOrFail();
    
        $otherPromotions = Promotion::where('slug', '!=', $a)
            ->latest()
            ->limit(5)
            ->get();
    
        return view('frontend.promotion.show', compact('promotion', 'otherPromotions'));
    }
    
}
