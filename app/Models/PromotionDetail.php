<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionDetail extends Model
{
    use HasFactory;

    public function promotion()
    {
        return $this->hasOne(Promotion::class, 'id', 'promotion_id');
    } 
}
