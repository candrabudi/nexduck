<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'web_name',
        'web_icon',
        'web_logo',
        'web_description',
        'web_token',
        'web_maintenance',
        'web_running_text'
    ];
}
