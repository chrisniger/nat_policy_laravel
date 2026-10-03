# WordPress → Laravel Migration Plan

## 1. Migration objective

Move the complete required WordPress content archive into Laravel while preserving:

- Content
- Authorship
- Dates
- Categories/tags
- Slugs
- Media
- SEO value
- Legacy URLs
- Page relationships

## 2. Supported extraction approaches

Choose the most reliable source available:

1. Direct read-only WordPress database export
2. WordPress XML/WXR export
3. WordPress REST API
4. Media uploads filesystem/archive

For a complete migration, database + uploads is preferred when access is available.

## 3. Pre-migration inventory

Before writing import code, produce counts for:

- Published posts
- Draft posts
- Pages
- Categories
- Tags
- Authors/users
- Attachments/media
- Comments
- Custom post types
- Custom fields
- Existing redirects
- SEO plugin metadata
- Menus
- Forms
- Gallery items

Also identify active WordPress SEO plugin and extract its metadata where possible.

## 4. Import sequencing

Recommended order:

1. Authors
2. Media
3. Categories
4. Tags
5. Pages
6. Articles/posts
7. Pivot relationships
8. Comments if retained
9. SEO metadata
10. Legacy redirects
11. Menus/navigation mapping
12. Search index
13. Analytics baselines where available

## 5. Legacy ID tracking

Every imported entity should retain `legacy_wp_id` where applicable.

Benefits:

- Idempotent re-imports
- Easier reconciliation
- Easier debugging
- Repeatable staging imports

## 6. Idempotency

The migration importer must be safely re-runnable.

Use upsert logic keyed by:

- `legacy_wp_id`, and
- fallback deterministic legacy URL/slug checks.

Never create duplicates on a rerun.

## 7. HTML sanitation

WordPress body HTML may contain:

- Shortcodes
- Gutenberg block comments
- Inline styles
- legacy embeds
- malformed markup
- plugin-specific markup

Migration should:

- Preserve valid semantic HTML.
- Remove unsupported shortcode wrappers while preserving meaningful content.
- Convert known embeds.
- Sanitize dangerous scripts/events.
- Keep headings, lists, blockquotes, images, captions and links.
- Produce a migration exception report for content needing manual review.

## 8. Media

For every attachment:

- Download/copy original.
- Verify checksum or file size.
- Map old URL to new media.
- Rewrite article-body media URLs.
- Preserve alt text/caption where available.
- Generate derivatives only after original is safely stored.
- Log missing media.

## 9. URLs and redirects

### Preferred rule

If an old public article path can be reused safely, keep it exactly.

Example:

```text
Old:
https://nationalpolicydialogue.org/nigeria-at-66-the-state-of-the-nation/

New:
https://nationalpolicydialogue.org/nigeria-at-66-the-state-of-the-nation/
```

No redirect is needed when the path is unchanged.

For changed URLs:

```text
OLD PATH → 301 → NEW CANONICAL URL
```

Do not create redirect chains.

## 10. Migration reconciliation report

After import, produce:

| Entity | WordPress Count | Laravel Count | Difference |
|---|---:|---:|---:|
| Published posts | | | |
| Pages | | | |
| Categories | | | |
| Tags | | | |
| Authors | | | |
| Media | | | |

Also run automated checks for:

- Duplicate slugs
- Missing article bodies
- Broken internal links
- Missing images
- Orphan categories
- Missing author mappings
- Invalid published dates
- Redirect loops
- 404s from sampled legacy URLs

## 11. Content sampling

Manually compare representative content:

- Oldest article
- Newest article
- Longest article
- Article with many images
- Article with no image
- Article from each major category
- Article with special formatting
- Static pages
- Gallery content

## 12. Cutover

1. Put WordPress publishing into temporary freeze/read-only mode.
2. Run final delta import.
3. Reconcile.
4. Take final backup.
5. Point production traffic to Laravel.
6. Monitor errors/404s.
7. Keep old WordPress data offline/archived for rollback and audit, not publicly active.
