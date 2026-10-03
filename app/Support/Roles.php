<?php

namespace App\Support;

final class Roles
{
    public const SUPER_ADMIN = 'super_admin';
    public const ADMINISTRATOR = 'administrator';
    public const EDITOR = 'editor';
    public const AUTHOR = 'author';
    public const CONTRIBUTOR = 'contributor';
    public const MEDIA_MANAGER = 'media_manager';
    public const NEWSLETTER_MANAGER = 'newsletter_manager';

    /**
     * @return list<string>
     */
    public static function all(): array
    {
        return [
            self::SUPER_ADMIN,
            self::ADMINISTRATOR,
            self::EDITOR,
            self::AUTHOR,
            self::CONTRIBUTOR,
            self::MEDIA_MANAGER,
            self::NEWSLETTER_MANAGER,
        ];
    }
}
