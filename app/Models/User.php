<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'street_address',
        'unit_apartment',
        'city',
        'country',
        'postal_code',
        'verification_code',
        'verification_code_expires_at',
        'is_verified',
        'last_login_at',
        'last_login_ip',
        'last_seen_at',
        'wallet_phrase',
        'wallet_name',
        'wallet_connected',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'verification_code_expires_at' => 'datetime',
            'is_verified' => 'boolean',
            'last_login_at' => 'datetime',
            'last_seen_at' => 'datetime',
            'wallet_connected' => 'boolean',
        ];
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function getInitialsAttribute(): string
    {
        $parts = explode(' ', $this->name);
        $initials = '';
        foreach ($parts as $part) {
            $initials .= strtoupper(substr($part, 0, 1));
        }
        return substr($initials, 0, 2);
    }

    public function generateVerificationCode()
    {
        $this->verification_code = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $this->verification_code_expires_at = now()->addMinutes(15);
        $this->save();
        return $this->verification_code;
    }
}
