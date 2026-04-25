<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'company',
        'subject',
        'message',
        'source',
        'status',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'new'       => 'bg-blue-100 text-blue-800',
            'contacted' => 'bg-yellow-100 text-yellow-800',
            'qualified' => 'bg-purple-100 text-purple-800',
            'converted' => 'bg-green-100 text-green-800',
            'closed'    => 'bg-gray-100 text-gray-800',
            default     => 'bg-gray-100 text-gray-800',
        };
    }
}
