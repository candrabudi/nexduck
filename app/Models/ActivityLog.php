<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'role', 
        'menu', 
        'action', 
        'ip_address', 
        'browser', 
        'is_failed', 
        'method', 
        'query_params', 
        'request_body', 
        'raw_json', 
        'latency',
        'latitude',
        'longitude',         
        'response_code',  
        'response_body',
        'country',
        'city', 
        'region',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
