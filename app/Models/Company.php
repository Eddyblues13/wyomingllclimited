<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'entity_type',
        'formation_state',
        'business_ending',
        'status',
        'state_fee',
        'partner_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getEntityTypeLabelAttribute(): string
    {
        return match($this->entity_type) {
            'llc' => 'LLC',
            'corp' => 'Corporation',
            'close-llc' => 'Close LLC',
            'close-corp' => 'Close Corporation',
            default => strtoupper($this->entity_type),
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'approved' => 'green',
            'pending' => 'yellow',
            'processing' => 'blue',
            'rejected' => 'red',
            default => 'gray',
        };
    }
}
