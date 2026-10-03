<?php

namespace App\Enums;

enum NewsletterSubscriberStatus: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Unsubscribed = 'unsubscribed';
    case Bounced = 'bounced';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Active => 'Active',
            self::Unsubscribed => 'Unsubscribed',
            self::Bounced => 'Bounced',
        };
    }
}
