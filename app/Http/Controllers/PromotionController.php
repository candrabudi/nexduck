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
        // Ambil promosi berdasarkan slug
        $promotion = Promotion::where('slug', $a)->firstOrFail();
    
        // Ambil promosi lain, kecuali promosi yang sedang dilihat
        $otherPromotions = Promotion::where('slug', '!=', $a)
            ->latest() // Urutkan berdasarkan waktu terbaru
            ->limit(5) // Batasi hanya 5 promosi
            ->get();
    
        // Return view dengan data promosi dan promosi lainnya
        return view('frontend.promotion.show', compact('promotion', 'otherPromotions'));
    }
    
}
