<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderApi extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_credential_id',
        'provider_id',
        'category_id',
        'provider_name',
        'provider_code',
        'provider_status',
        'provider_type'
    ];
}
