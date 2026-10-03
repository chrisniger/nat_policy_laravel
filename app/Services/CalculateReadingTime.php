<?php

namespace App\Services;

class CalculateReadingTime
{
    /**
     * Average adult reading speed for long-form text (words per minute).
     */
    protected const WORDS_PER_MINUTE = 220;

    /**
     * Estimate the reading time of an HTML/article body in whole minutes.
     */
    public static function forBody(?string $body): int
    {
        $text = trim(strip_tags((string) $body));

        if ($text === '') {
            return 0;
        }

        $wordCount = str_word_count($text);

        return max(1, (int) ceil($wordCount / self::WORDS_PER_MINUTE));
    }
}
