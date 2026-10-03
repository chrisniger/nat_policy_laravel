# National Policy Dialogue — Laravel Rebuild

WordPress → Laravel premium publishing and engagement platform for
[nationalpolicydialogue.org](https://nationalpolicydialogue.org/).

The documentation pack in [docs/](docs/) is the **implementation source of truth**.
Start with [docs/00_README.md](docs/00_README.md) and follow the read order there.

## Stack

- Laravel 13 (PHP 8.3+), SQLite locally / MySQL 8+ or PostgreSQL in production
- Filament admin panel at `/admin` (green-branded)
- Spatie laravel-permission for the role system (doc 13)
- Blade + Livewire + Tailwind + Vite for the public site (from Phase 3)

## Getting started

```bash
composer install
cp .env.example .env          # then set APP_KEY (php artisan key:generate)
php artisan migrate --seed
php artisan serve
```

Admin panel: <http://localhost:8000/admin>

Local development super admin (created by `SuperAdminSeeder`):

- email: `admin@nationalpolicydialogue.test`
- password: `password`

Override with `NPD_SUPER_ADMIN_EMAIL` / `NPD_SUPER_ADMIN_PASSWORD` / `NPD_SUPER_ADMIN_NAME`
before seeding in non-local environments. **Never use these defaults in production.**

## Testing

```bash
php artisan test
```

## Current status — Phase 1 (Laravel Foundation)

- [x] Full domain schema migrated ([docs/06_DATABASE_AND_CONTENT_MODEL.md](docs/06_DATABASE_AND_CONTENT_MODEL.md)):
      articles, authors, categories, tags, media, pages, revisions, redirects,
      article views, search queries, newsletter, dialogue room, membership,
      contact messages, social accounts/posts, settings, audit logs
- [x] Eloquent models + status enums for every table
- [x] Staff roles: super_admin, administrator, editor, author, contributor,
      media_manager, newsletter_manager (roles seeded)
- [x] Role-gated Filament admin (`canAccessPanel`: active status + assigned role)
- [x] Super admin bypasses all authorization checks server-side
- [x] Cached key/value `Settings` service
- [x] `AuditLogger` service (hashed IP, actor + subject tracking)
- [x] Baseline test suite (panel access control, content model, settings, audit)

## Conventions

- Domain logic lives in services/actions (see `app/Services`, later `app/Domain`), never
  inside admin UI components (doc 07 §2).
- Every imported WordPress entity keeps `legacy_wp_id` / `legacy_url` (doc 08 §5).
- Article wording is never rewritten during migration (doc 01 §4).
- All sensitive actions must be authorized server-side via policies/gates (doc 13 §3).
