<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class Settings
{
    protected const CACHE_KEY = 'npd.settings';

    /**
     * Get a setting value by key.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $settings = static::all();

        return array_key_exists($key, $settings) ? $settings[$key] : $default;
    }

    /**
     * Set a setting value and persist it.
     */
    public static function set(string $key, mixed $value): void
    {
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);

        static::flush();
    }

    /**
     * Remove a setting.
     */
    public static function forget(string $key): void
    {
        Setting::where('key', $key)->delete();

        static::flush();
    }

    /**
     * All settings as a key => value array (cache-backed).
     *
     * @return array<string, mixed>
     */
    public static function all(): array
    {
        return Cache::rememberForever(static::CACHE_KEY, function () {
            return Setting::query()
                ->pluck('value', 'key')
                ->all();
        });
    }

    /**
     * Clear the settings cache.
     */
    public static function flush(): void
    {
        Cache::forget(static::CACHE_KEY);
    }
}
