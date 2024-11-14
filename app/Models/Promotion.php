<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'type',
        'claim_deposit',
        'min_deposit',
        'max_deposit',
        'max_withdraw',
        'target',
        'status',
        'image',
    ];
}
