<?php

namespace App\Models;

use App\Enums\DialogueTopicStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DialogueTopic extends Model
{
    protected $fillable = [
        'title',
        'prompt',
        'description',
        'slug',
        'status',
        'opens_at',
        'closes_at',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'status' => DialogueTopicStatus::class,
            'opens_at' => 'datetime',
            'closes_at' => 'datetime',
            'featured' => 'boolean',
        ];
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(DialogueSubmission::class);
    }
}
