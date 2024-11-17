<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Provider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {

        $slots = cache()->remember('slots', 60, function () {
            return Provider::where('provider_type', 'SLOT')
                ->where('provider_status', 1)
                ->get();
        });
 
        $casinos = cache()->remember('casinos', 60, function () {
            return Provider::where('provider_type', 'LIVE')
                ->where('provider_status', 1)
                ->get();
        });
        
        return view('frontend.home', compact('slots', 'casinos'));
    }
}
