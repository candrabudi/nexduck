<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
class SeoController extends Controller
{
    public function index()
    {
        $seo = SeoSetting::first();
        return view('backend.seo.index', compact('seo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'google_analytics' => 'nullable|string',
            'facebook_pixel' => 'nullable|string',
            'google_search_console' => 'nullable|string',
            'facebook_app_id' => 'nullable|string',
            'twitter_card' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'twitter_title' => 'nullable|string',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'sitemap_file' => 'nullable|file|mimes:xml',
            'robots_file' => 'nullable|file|mimes:txt',
        ]);

        $seo = SeoSetting::first() ?: new SeoSetting;

        $seo->seo_title = $validated['seo_title'] ?? null;
        $seo->seo_description = $validated['seo_description'] ?? null;
        $seo->seo_keywords = $validated['seo_keywords'] ?? null;
        $seo->google_analytics = $validated['google_analytics'] ?? null;
        $seo->facebook_pixel = $validated['facebook_pixel'] ?? null;
        $seo->google_search_console = $validated['google_search_console'] ?? null;
        $seo->facebook_app_id = $validated['facebook_app_id'] ?? null;
        $seo->twitter_card = $validated['twitter_card'] ?? null;
        $seo->og_title = $validated['og_title'] ?? null;
        $seo->og_description = $validated['og_description'] ?? null;
        $seo->twitter_title = $validated['twitter_title'] ?? null;
        $seo->twitter_description = $validated['twitter_description'] ?? null;

        if ($request->hasFile('og_image')) {
            $seo->og_image = $request->file('og_image')->store('seo_images', 'public');
        }

        if ($request->hasFile('twitter_image')) {
            $seo->twitter_image = $request->file('twitter_image')->store('seo_images', 'public');
        }

        if ($request->hasFile('sitemap_file')) {
            $seo->sitemap_url = $request->file('sitemap_file')->store('sitemaps', 'public');
        }

        if ($request->hasFile('robots_file')) {
            $seo->robots_txt = $request->file('robots_file')->store('robots', 'public');
        }

        $seo->save();

        return redirect()->route('backoffice.seo.index')->with('success', 'SEO settings updated successfully.');
    }

    public function generateSitemap()
    {
        // Ambil semua route yang ada
        $routes = Route::getRoutes();

        // Buat array untuk menyimpan URL sitemap
        $urls = [];

        // Ambil URL untuk semua route non-authenticated
        foreach ($routes as $route) {
            // Pastikan route tidak terkait dengan authentication (misalnya, menggunakan middleware 'auth')
            if (!in_array('auth', $route->middleware())) {
                $url = URL::to($route->uri());

                // Tambahkan URL ke array
                $urls[] = $url;
            }
        }

        // Format output XML untuk sitemap
        $sitemapXml = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemapXml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {
            $sitemapXml .= "<url><loc>{$url}</loc></url>";
        }

        $sitemapXml .= '</urlset>';

        // Tentukan path file sitemap
        $path = public_path('sitemap.xml');

        // Simpan sitemap ke file
        File::put($path, $sitemapXml);

        // Berikan feedback sukses
        return redirect()->route('admin.sitemap.index')->with('success', 'Sitemap telah berhasil di-generate!');
    }
}
