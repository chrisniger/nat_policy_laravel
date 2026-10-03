<?php

namespace App\Models;

use App\Enums\SocialPlatform;
use App\Enums\SocialPostStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialPost extends Model
{
    protected $fillable = [
        'article_id',
        'platform',
        'social_account_id',
        'content',
        'media_id',
        'status',
        'scheduled_at',
        'published_at',
        'remote_post_id',
        'remote_url',
        'attempts',
        'last_error',
    ];

    protected function casts(): array
    {
        return [
            'platform' => SocialPlatform::class,
            'status' => SocialPostStatus::class,
            'scheduled_at' => 'datetime',
            'published_at' => 'datetime',
        ];
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(SocialAccount::class, 'social_account_id');
    }

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
