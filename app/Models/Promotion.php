<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'short_desc',
        'content',
        'start_date',
        'end_date',
        'promotion_type',
        'provider_category',
        'bonus_type',
        'status',
        'thumbnail',
    ];

    public function claimPromotions()
    {
        return $this->hasMany(ClaimPromotion::class);
    }
    

    public function promotionDetail()
    {
        return $this->hasOne(PromotionDetail::class, 'promotion_id', 'id');
    }

    public function details()
    {
        return $this->hasOne(PromotionDetail::class, 'promotion_id');
    }
}
