<?php

namespace App\Models;

use App\Enums\MembershipApplicationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembershipApplication extends Model
{
    protected $fillable = [
        'reference_code',
        'photo_media_id',
        'title',
        'full_name',
        'date_of_birth',
        'nationality',
        'state_province',
        'lga',
        'contact_address',
        'phone',
        'email',
        'occupation',
        'organization',
        'designation',
        'years_experience',
        'areas_of_interest',
        'membership_classification',
        'declaration_accepted',
        'status',
        'notes',
        'submitted_at',
        'reviewed_by',
    ];

    protected function casts(): array
    {
        return [
            'status' => MembershipApplicationStatus::class,
            'date_of_birth' => 'date',
            'areas_of_interest' => 'array',
            'declaration_accepted' => 'boolean',
            'submitted_at' => 'datetime',
        ];
    }

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'photo_media_id');
    }

    public function reviewedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
