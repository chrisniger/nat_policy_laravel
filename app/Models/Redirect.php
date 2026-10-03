<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_path',
        'to_url',
        'http_status',
        'hits',
        'last_hit_at',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'last_hit_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }
}
