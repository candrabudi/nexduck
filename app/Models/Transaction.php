<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Specify the fillable attributes
    protected $fillable = [
        'status',
        'amount',
        'user_id',
        'admin_bank_id',
        'user_bank_id',
        'updated_by',
        'updated_ip_address',
        'reason', // Add reason here if it is used for rejected transactions
        // Add other fields as needed
    ];

    public function adminBank()
    {
        return $this->hasOne(BankAccount::class, 'id', 'admin_bank_id')
            ->with('bank');
    }

    public function userBank()
    {
        return $this->hasOne(MemberBank::class, 'id', 'user_bank_id')
            ->with('bank');
    }

    public function userUpdate()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')
            ->with('member');
    }
}
