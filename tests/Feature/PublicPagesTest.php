<?php

namespace Tests\Feature;

use App\Enums\ArticleStatus;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Database\Seeders\SampleContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(SampleContentSeeder::class);
    }

    #[Test]
    public function homepage_shows_the_featured_story_and_sections(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Ghana-Must-Go Decade', false)
            ->assertSee('Most Read')
            ->assertSee('Awakening the New Nigeria Consciousness', false);
    }

    #[Test]
    public function insights_listing_shows_published_articles(): void
    {
        $this->get('/insights')
            ->assertOk()
            ->assertSee('Fertiliser Subsidy', false);
    }

    #[Test]
    public function category_archive_shows_its_articles(): void
    {
        $this->get('/category/agribusiness')
            ->assertOk()
            ->assertSee('Agribusiness')
            ->assertSee('Fertiliser Subsidy', false);
    }

    #[Test]
    public function article_page_renders_the_full_story(): void
    {
        $article = Article::where('slug', 'like', 'the-ghana-must-go-decade%')->firstOrFail();

        $this->get("/{$article->slug}")
            ->assertOk()
            ->assertSee($article->title)
            ->assertSee('min read')
            ->assertSee('Related Insights');
    }

    #[Test]
    public function article_view_recording_increments_the_daily_aggregate(): void
    {
        $article = Article::where('slug', 'like', 'the-ghana-must-go-decade%')->firstOrFail();

        $this->get("/{$article->slug}")->assertOk();

        $this->assertDatabaseHas('article_views', [
            'article_id' => $article->id,
            'viewed_on' => now()->toDateString(),
        ]);
    }

    #[Test]
    public function search_finds_matching_articles(): void
    {
        $this->get('/search?q=fertiliser')
            ->assertOk()
            ->assertSee('Fertiliser Subsidy', false);
    }

    #[Test]
    public function drafts_are_not_visible_to_the_public(): void
    {
        $author = Author::firstOrFail();
        $category = Category::firstOrFail();

        Article::create([
            'author_id' => $author->id,
            'title' => 'Secret Draft Editorial',
            'slug' => 'secret-draft-editorial',
            'body' => '<p>Confidential.</p>',
            'status' => ArticleStatus::Draft,
        ]);

        $this->get('/secret-draft-editorial')->assertNotFound();
    }
}
