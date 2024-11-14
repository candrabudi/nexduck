<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $slots = Provider::where('category_id', 1)
            ->where('provider_status', 1)
            ->get();
        return view('frontend.home', compact('slots'));
    }
}
