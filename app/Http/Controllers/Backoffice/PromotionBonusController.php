<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\PromotionDetail;
use Illuminate\Http\Request;

class PromotionBonusController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        $promotionDetails = PromotionDetail::all();
        return view('backend.promotionbonus.index', compact('promotionDetails', 'promotions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'promotion_id' => 'required|integer',
            'min_deposit' => 'required|integer',
            'max_deposit' => 'required|integer',
            'max_withdraw' => 'required|integer',
            'turn_over' => 'required|integer',
            'percentage_bonus' => 'required|integer',
        ]);

        PromotionDetail::create($request->all());

        return redirect()->route('promotion-details.index')->with('success', 'Promotion added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'promotion_id' => 'required|integer',
            'min_deposit' => 'required|integer',
            'max_deposit' => 'required|integer',
            'max_withdraw' => 'required|integer',
            'turn_over' => 'required|integer',
            'percentage_bonus' => 'required|integer',
        ]);

        $promotionDetail = PromotionDetail::findOrFail($id);
        $promotionDetail->update($request->all());

        return redirect()->route('promotion-details.index')->with('success', 'Promotion updated successfully');
    }

    public function destroy($id)
    {
        $promotionDetail = PromotionDetail::findOrFail($id);
        $promotionDetail->delete();

        return redirect()->route('promotion-details.index')->with('success', 'Promotion deleted successfully');
    }
}
