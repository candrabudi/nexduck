<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'main_balance',
        'referral_balance',
    ];
}
