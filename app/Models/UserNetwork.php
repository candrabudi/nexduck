<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNetwork extends Model
{
    use HasFactory;
    protected $fillable = [
        'network_id',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'user_id', 'user_id');
    }

    public function transactionDeposit()
    {
        return $this->hasOne(Transaction::class, 'user_id', 'user_id')
            ->where('status', 'approved');
    }
    
    public function transactionDeposits()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'user_id')
            ->where('status', 'approved');
    }
}
