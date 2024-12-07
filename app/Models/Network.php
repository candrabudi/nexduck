<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'referral',
        'photo_id_card',
        'status',
    ];
    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
