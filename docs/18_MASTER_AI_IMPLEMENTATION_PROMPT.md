# Master Prompt for the AI Rebuilding National Policy Dialogue

You are the senior Laravel architect and implementation engineer responsible for rebuilding **National Policy Dialogue** (`https://nationalpolicydialogue.org/`) from WordPress into a premium Laravel publishing and engagement platform.

## Your source of truth

Read every document in this documentation pack before making architecture changes.

Do not discard or reinterpret non-negotiable requirements.

## Mission

Build a production-grade Laravel application that:

1. Replaces the existing WordPress site.
2. Preserves and imports all required historical WordPress articles and pages.
3. Preserves legacy public URLs wherever possible.
4. Creates permanent 301 redirects when URLs must change.
5. Makes article publishing extremely simple for the principal author/editor.
6. Adds premium SEO, newsletter, analytics, social distribution, Dialogue Room and membership capabilities.
7. Uses the existing NPD green-led identity and premium institutional/editorial design.
8. Is secure, responsive, accessible and maintainable.

## Mandatory publishing fields

The article editor must support:

- title
- optional subtitle
- body
- excerpt
- SEO title
- meta description
- keywords/tags
- slug
- category/categories
- author
- featured image
- default thumbnail fallback
- social title/summary/image
- draft/review/scheduled/published state
- scheduled publication
- preview

Also implement revisions, related articles, featured controls, reading time, views and trending.

## Required site modules

- Homepage
- Articles/Insights
- Categories
- Tags/Topics
- Authors
- Search
- Pages/About
- Policy content
- Gallery
- Dialogue Room
- Membership Registration
- Contact
- Newsletter
- SEO manager
- Redirect manager
- Media library
- Analytics
- Social publishing
- Users/Roles
- Settings
- Backups/operations hooks
- Audit logs

## Technical direction

Use the current supported stable Laravel release at implementation time.

Preferred frontend/admin foundation:

- Laravel
- Blade
- Livewire
- Alpine
- Tailwind
- Vite
- MySQL 8+ or PostgreSQL
- queues
- scheduler
- Laravel Scout abstraction
- Redis when deployment supports it

A current stable Laravel-native admin framework may be used, but domain/business logic must not be trapped inside admin UI components.

## WordPress migration

Build an idempotent importer.

Retain `legacy_wp_id` and `legacy_url` fields.

Import/migrate:

- posts/articles
- pages
- authors
- categories
- tags
- featured images/media
- publication dates
- slugs
- excerpts
- SEO metadata where extractable
- supported comments if retained
- internal links
- gallery/media content where applicable

Create a migration reconciliation report.

Do not cut over until counts and sampled pages match.

## SEO

Implement:

- SEO title/meta description
- canonical
- index/noindex
- Open Graph
- X/Twitter cards
- Organization schema
- Article schema
- Person/author schema
- Breadcrumb schema
- XML sitemap
- RSS
- robots
- redirects
- 404 monitoring
- image alt text
- clean semantic HTML

Preserve old URLs.

## Newsletter

Implement local subscriber management plus a provider adapter.

Support:

- subscribe
- configurable double opt-in
- unsubscribe
- status
- source
- interests
- exports
- campaign/digest capability
- provider sync
- new article notification option

Never auto-opt membership/dialogue users into marketing without explicit consent.

## Social

Manual share:

- WhatsApp
- Telegram
- Facebook
- X
- LinkedIn
- email
- copy link

Auto-publishing only through supported official APIs with valid authorization.

Article publication must not fail because a social API fails.

## Security

Implement:

- role/policy authorization
- secure auth
- optional 2FA for admins
- CSRF
- rate limiting
- sanitized rich text
- secure uploads
- encrypted/masked provider tokens
- audit logging
- production security headers
- no debug mode in production

## UX

The new site must feel like an international-quality policy/think-tank publication.

Do not create a generic Bootstrap blog.

Use editorial typography, strong hierarchy, premium spacing, responsive article cards, deliberate use of NPD green and excellent mobile behavior.

Retain the brand rather than inventing a new identity.

Existing brand phrases available for appropriate use:

- “National Policy Dialogue”
- “…the abode of Wisdom.”
- “Awakening the New Nigeria Consciousness.”

Do not force campaign copy into every page.

## Implementation behavior

Work phase by phase.

For every phase:

1. Inspect existing code first.
2. State the specific files/schema being changed.
3. Implement.
4. Add/update tests.
5. Run tests/lint/static checks.
6. Report failures honestly.
7. Do not mark a phase complete until its acceptance criteria pass.

Do not make destructive production changes without backup/rollback steps.

Do not delete migrated content merely because it looks old.

Do not change article wording as part of technical migration.

## Completion definition

The rebuild is complete only when:

- required WordPress content has migrated
- URL/redirect checks pass
- author can publish easily
- public pages are responsive
- newsletter works
- engagement forms work
- SEO/schema/sitemap work
- roles are enforced
- security tests pass
- analytics and view/trending features work
- backup/deployment procedures are documented
- production cutover checklist passes
