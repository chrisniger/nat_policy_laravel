<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    /** @use HasFactory<ArticleFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'legacy_wp_id',
        'author_id',
        'title',
        'subtitle',
        'slug',
        'excerpt',
        'body',
        'status',
        'featured_media_id',
        'default_image_used',
        'seo_title',
        'meta_description',
        'canonical_url',
        'robots_index',
        'robots_follow',
        'social_title',
        'social_description',
        'social_media_id',
        'allow_comments',
        'show_view_count',
        'featured',
        'featured_weight',
        'published_at',
        'scheduled_at',
        'updated_content_at',
        'legacy_url',
        'created_by',
        'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'status' => ArticleStatus::class,
            'default_image_used' => 'boolean',
            'robots_index' => 'boolean',
            'robots_follow' => 'boolean',
            'allow_comments' => 'boolean',
            'show_view_count' => 'boolean',
            'featured' => 'boolean',
            'published_at' => 'datetime',
            'scheduled_at' => 'datetime',
            'updated_content_at' => 'datetime',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function featuredMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_media_id');
    }

    public function socialMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'social_media_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function revisions(): HasMany
    {
        return $this->hasMany(ArticleRevision::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(ArticleView::class);
    }

    public function socialPosts(): HasMany
    {
        return $this->hasMany(SocialPost::class);
    }

    public function campaigns(): BelongsToMany
    {
        return $this->belongsToMany(NewsletterCampaign::class, 'newsletter_campaign_article');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Scope to articles visible to the public.
     */
    public function scopePublished($query)
    {
        return $query
            ->where('status', ArticleStatus::Published)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }
}
