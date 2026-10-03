<?php

namespace App\Enums;

enum MembershipApplicationStatus: string
{
    case Pending = 'pending';
    case UnderReview = 'under_review';
    case AwaitingInfo = 'awaiting_info';
    case Approved = 'approved';
    case Rejected = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::UnderReview => 'Under Review',
            self::AwaitingInfo => 'Awaiting Information',
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
        };
    }
}
