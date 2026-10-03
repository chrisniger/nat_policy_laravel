<?php

namespace App\Models;

use App\Enums\SocialPlatform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SocialAccount extends Model
{
    protected $fillable = [
        'platform',
        'label',
        'credentials',
        'status',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'platform' => SocialPlatform::class,
            'credentials' => 'encrypted:array',
            'expires_at' => 'datetime',
        ];
    }

    protected $hidden = [
        'credentials',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(SocialPost::class);
    }
}
