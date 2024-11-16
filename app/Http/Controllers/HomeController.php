<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        // Define parameters
        // $operatorCode = 'p04i';
        // $providerCode = 'JD';
        // $lang = 'en';
        // $html = 0;
        // $reformatJson = 'yes';
        // $secretKey = 'f74dca0157bc39e5db716da7a7ef8910';
        // $signatureString = strtolower($operatorCode) . strtoupper($providerCode) . $secretKey;
        // $signature = strtoupper(md5($signatureString));

        // $url = 'http://gsmd.336699bet.com/getGameList.ashx';

        // // Send a GET request to the API
        // $response = Http::get($url, [
        //     'operatorcode' => $operatorCode,
        //     'providercode' => $providerCode,
        //     'lang' => $lang,
        //     'html' => $html,
        //     'reformatjson' => $reformatJson,
        //     'signature' => $signature,
        // ]);

        // if ($response->successful()) {
        //     $data = $response->json();

        //     $gamelist = json_decode($data['gamelist'], true);

        //     // return $data;
        //     foreach($gamelist as $gl) {
        //         $category = Category::where('category_code', strtolower($gl['p_type']))
        //             ->first();
                
        //         $provider = Provider::where('provider_code', $gl['p_code'])
        //             ->first();
        //         $store = new Game();
        //         $store->category_id = $category->id;
        //         $store->provider_id = $provider->id;
        //         $store->game_name = $gl['gameName']['gameName_enus']; 
        //         $store->game_name = $gl['gameName']['gameName_enus']; 
        //         $store->game_code = $gl['g_code']; 
        //         $store->game_code = $gl['g_code']; 
        //         $store->game_image = $gl['imgFileName']; 
        //         $store->game_status = $gl['status']; 
        //         $store->game_provider_code = $gl['p_code'];
        //         $store->save(); 
        //     }
        //     return response()->json($gamelist);
        // } else {
        //     return response()->json(['error' => 'Failed to fetch game list'], $response->status());
        // }

        $slots = Provider::join('category_provider as cp', 'cp.provider_id',  'providers.id')
            ->where('cp.category_id', 4)
            ->where('provider_status', 1)
            ->get();

        // return $slots;
        return view('frontend.home', compact('slots'));
    }
}
