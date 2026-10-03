<?php

namespace App\Enums;

enum SocialPlatform: string
{
    case Facebook = 'facebook';
    case X = 'x';
    case LinkedIn = 'linkedin';
    case Telegram = 'telegram';

    public function label(): string
    {
        return match ($this) {
            self::Facebook => 'Facebook',
            self::X => 'X (Twitter)',
            self::LinkedIn => 'LinkedIn',
            self::Telegram => 'Telegram',
        };
    }
}
