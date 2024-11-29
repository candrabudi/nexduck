<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'promotion_id',
        'min_deposit',
        'max_deposit',
        'max_withdraw',
        'turn_over',
        'percentage_bonus',
    ];
    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }
    
}
