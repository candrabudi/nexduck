<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('backend.promotions.index', compact('promotions'));
    }

    public function store(Request $request)
    {
        Promotion::create($request->all());
        return response()->json(['success' => true, 'message' => 'Promotion added successfully']);
    }

    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return response()->json(['promotion' => $promotion]);
    }

    public function update(Request $request, $id)
    {
        $promotion = Promotion::find($id);
        $promotion->update($request->all());
        return response()->json(['success' => true, 'message' => 'Promotion updated successfully']);
    }

    public function destroy($id)
    {
        Promotion::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Promotion deleted successfully']);
    }

}
