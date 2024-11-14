<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_name', 'banner_image', 'banner_status', 'created_by', 'updated_by', 'created_ip_address', 'updated_ip_address'
    ];
}
