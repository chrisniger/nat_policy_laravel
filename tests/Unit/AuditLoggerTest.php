<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\AuditLog;
use App\Models\Author;
use App\Models\User;
use App\Services\AuditLogger;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AuditLoggerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_records_an_action_with_actor_and_subject(): void
    {
        $user = User::create([
            'name' => 'Editor',
            'email' => 'editor@example.test',
            'password' => 'password',
            'status' => 'active',
        ]);

        $author = Author::create(['name' => 'Wisdom', 'slug' => 'wisdom']);
        $article = Article::create([
            'author_id' => $author->id,
            'title' => 'Test article',
            'slug' => 'test-article',
            'body' => 'Body',
            'status' => 'draft',
        ]);

        $log = (new AuditLogger)->record('article.published', $article, ['platform' => 'web'], $user);

        $this->assertDatabaseHas('audit_logs', [
            'id' => $log->id,
            'actor_user_id' => $user->id,
            'action' => 'article.published',
            'subject_type' => Article::class,
            'subject_id' => $article->id,
        ]);
        $this->assertSame(['platform' => 'web'], $log->metadata);
    }

    #[Test]
    public function it_allows_anonymous_actions_without_an_actor(): void
    {
        $log = (new AuditLogger)->record('redirect.created', null, ['from' => '/old']);

        $this->assertNull($log->actor_user_id);
        $this->assertNull($log->subject_type);
        $this->assertSame('redirect.created', $log->action);
        $this->assertCount(1, AuditLog::all());
    }
}
