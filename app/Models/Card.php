<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = [
        'user_id',
        'card_number',
        'card_holder_name',
        'card_type',
        'balance',
        'wallet_name',
        'cvv',
        'expiry_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
