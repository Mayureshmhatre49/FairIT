<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'company',
        'avatar',
        'content',
        'rating',
        'is_active',
        'order',
    ];

    protected $casts = [
        'rating'    => 'integer',
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];
}
