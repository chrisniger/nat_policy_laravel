<?php

namespace App\Enums;

enum DialogueSubmissionStatus: string
{
    case New = 'new';
    case Reviewed = 'reviewed';
    case Approved = 'approved';
    case Published = 'published';
    case Rejected = 'rejected';
    case Spam = 'spam';

    public function label(): string
    {
        return match ($this) {
            self::New => 'New',
            self::Reviewed => 'Reviewed',
            self::Approved => 'Approved',
            self::Published => 'Published',
            self::Rejected => 'Rejected',
            self::Spam => 'Spam',
        };
    }
}
