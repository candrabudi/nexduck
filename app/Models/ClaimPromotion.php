<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimPromotion extends Model
{
    use HasFactory;

    public function promotion()
    {
        return $this->hasOne(Promotion::class, 'id', 'promotion_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
