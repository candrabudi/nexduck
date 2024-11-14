<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCredential extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'agent_url',
        'agent_code',
        'agent_signature',
        'agent_status',
        'agent_type',
        'agent_password'
    ];
}
