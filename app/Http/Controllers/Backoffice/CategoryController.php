<?php

namespace App\Http\Controllers\Backoffice;

use App\Helpers\AesEncryptionHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
            $categories = Category::all();
            return view('backend.category.index', compact('categories'));
        } catch (\Exception $e) {
            abort(413);
        }
    }
}
