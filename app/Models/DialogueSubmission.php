<?php

namespace App\Models;

use App\Enums\DialogueSubmissionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DialogueSubmission extends Model
{
    protected $fillable = [
        'dialogue_topic_id',
        'name',
        'phone',
        'email',
        'contribution',
        'consent',
        'status',
        'published_slug',
        'reviewed_by',
        'reviewed_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => DialogueSubmissionStatus::class,
            'consent' => 'boolean',
            'reviewed_at' => 'datetime',
        ];
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(DialogueTopic::class, 'dialogue_topic_id');
    }

    public function reviewedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
