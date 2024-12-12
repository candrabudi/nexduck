<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'account_name',
        'account_number',
        'account_status',
        'account_image'
    ];

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
