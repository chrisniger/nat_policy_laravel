<?php

namespace Tests\Feature;

use App\Enums\ArticleStatus;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ContentModelTest extends TestCase
{
    use RefreshDatabase;

    protected function createArticle(array $overrides = []): Article
    {
        $author = Author::firstOrCreate(
            ['slug' => 'npd-author'],
            ['name' => 'NPD Author'],
        );

        return Article::create(array_merge([
            'author_id' => $author->id,
            'title' => 'Nigeria at 66: The State of the Nation',
            'slug' => 'nigeria-at-66-the-state-of-the-nation',
            'body' => '<p>Long-form body.</p>',
            'status' => ArticleStatus::Published,
            'published_at' => now()->subDay(),
        ], $overrides));
    }

    #[Test]
    public function an_article_belongs_to_an_author_and_accepts_categories_and_tags(): void
    {
        $article = $this->createArticle();

        $category = Category::create(['name' => 'Dialogue with Wisdom', 'slug' => 'dialogue-with-wisdom']);
        $tag = Tag::create(['name' => 'Policy', 'slug' => 'policy']);

        $article->categories()->attach($category);
        $article->tags()->attach($tag);

        $this->assertSame('NPD Author', $article->author->name);
        $this->assertTrue($article->categories->contains($category));
        $this->assertTrue($article->tags->contains($tag));
    }

    #[Test]
    public function the_published_scope_only_returns_visible_published_articles(): void
    {
        $published = $this->createArticle(['slug' => 'published-a']);
        $this->createArticle([
            'slug' => 'draft-b',
            'status' => ArticleStatus::Draft,
            'published_at' => null,
        ]);
        $this->createArticle([
            'slug' => 'future-c',
            'published_at' => now()->addDay(),
        ]);

        $slugs = Article::published()->pluck('slug')->all();

        $this->assertContains('published-a', $slugs);
        $this->assertNotContains('draft-b', $slugs);
        $this->assertNotContains('future-c', $slugs);
        $this->assertSame(ArticleStatus::Published, $published->status);
    }

    #[Test]
    public function categories_support_hierarchy(): void
    {
        $parent = Category::create(['name' => 'News', 'slug' => 'news']);
        $child = Category::create(['name' => 'Agribusiness', 'slug' => 'agribusiness', 'parent_id' => $parent->id]);

        $this->assertTrue($parent->children->contains($child));
        $this->assertSame('News', $child->parent->name);
    }
}
