<?php

namespace Tests\Unit;

use App\Services\Settings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_stores_and_reads_a_setting(): void
    {
        Settings::set('site.tagline', 'the abode of Wisdom');

        $this->assertSame('the abode of Wisdom', Settings::get('site.tagline'));
        $this->assertDatabaseHas('settings', ['key' => 'site.tagline']);
    }

    #[Test]
    public function it_returns_the_default_for_missing_keys(): void
    {
        $this->assertSame('fallback', Settings::get('missing.key', 'fallback'));
        $this->assertNull(Settings::get('missing.key'));
    }

    #[Test]
    public function it_forgets_a_setting(): void
    {
        Settings::set('site.tagline', 'x');
        Settings::forget('site.tagline');

        $this->assertDatabaseMissing('settings', ['key' => 'site.tagline']);
        $this->assertNull(Settings::get('site.tagline'));
    }

    #[Test]
    public function set_updates_an_existing_key_instead_of_duplicating(): void
    {
        Settings::set('site.tagline', 'first');
        Settings::set('site.tagline', 'second');

        $this->assertSame(1, DB::table('settings')->where('key', 'site.tagline')->count());
        $this->assertSame('second', Settings::get('site.tagline'));
    }
}
