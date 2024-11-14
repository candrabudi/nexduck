<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_code',
        'bank_name',
        'bank_status',
        'bank_image',
    ];

    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class, 'bank_id', 'id');
    }
}
