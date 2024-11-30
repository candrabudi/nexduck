<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi
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
        'latitude',          // Add latitude
        'longitude',         // Add longitude
        'response_code',     // Add response_code
        'response_body',     // Add response_body
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
