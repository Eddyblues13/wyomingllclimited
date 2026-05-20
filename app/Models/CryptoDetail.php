<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoDetail extends Model
{
    use HasFactory;

    protected $table = 'crypto_details';

    protected $fillable = [
        'name',
        'symbol',
        'network',
        'deposit_address',
        'icon_url',
        'bg_color',
        'data_symbol',
    ];
}
