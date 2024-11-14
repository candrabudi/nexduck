<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberBank extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bank_id',
        'account_name',
        'account_number',
        'account_status',
    ];

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
