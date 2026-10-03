# WordPress Migration Field Mapping

The exact field names depend on the installed WordPress plugins. This mapping is the baseline.

## Posts → articles

| WordPress | Laravel |
|---|---|
| `wp_posts.ID` | `articles.legacy_wp_id` |
| `post_title` | `articles.title` |
| `post_name` | `articles.slug` |
| `post_content` | `articles.body` |
| `post_excerpt` | `articles.excerpt` |
| `post_status` | mapped `articles.status` |
| `post_date` / `post_date_gmt` | `articles.published_at` / migration metadata |
| `post_modified` | `articles.updated_content_at` where meaningful |
| `post_author` | mapped `authors.id` |
| permalink | `articles.legacy_url` |
| `_thumbnail_id` meta | `articles.featured_media_id` |
| SEO title meta | `articles.seo_title` |
| SEO description meta | `articles.meta_description` |
| canonical meta | `articles.canonical_url` if intentional |

## Taxonomy

| WordPress | Laravel |
|---|---|
| category term | `categories` |
| post_tag term | `tags` |
| term relationship | `article_category` / `article_tag` |
| parent term | `categories.parent_id` |

## Users/authors

Do not import WordPress password hashes into Laravel as usable passwords unless a deliberate compatible migration strategy is reviewed.

Prefer:

- map author identity/content,
- create staff accounts intentionally,
- issue secure password reset/setup.

## Media

| WordPress | Laravel |
|---|---|
| attachment post ID | `media.legacy_wp_id` |
| attachment URL/path | storage object/path |
| `_wp_attachment_image_alt` | `media.alt_text` |
| caption | `media.caption` |
| title | `media.title` |
| metadata dimensions | width/height |

## Pages

Map WordPress pages to Laravel `pages`.

If a special page is being replaced by a functional module (for example Membership or Dialogue Room), preserve the old route but render the new functional page.

## SEO plugin discovery

Before import, identify whether the existing site uses:

- Yoast
- Rank Math
- All in One SEO
- another plugin

Write a plugin-specific metadata adapter rather than hard-coding assumptions into the core importer.

## Comments

If comments are retained:

- import only legitimate approved content
- preserve author/date where allowed
- sanitize content
- preserve parent/thread relationship if feasible

If comments are disabled in the new site, retain the old data in an archive/export rather than silently destroying it.
