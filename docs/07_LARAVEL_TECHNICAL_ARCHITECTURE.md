# Laravel Technical Architecture

## 1. Recommended application stack

Use the **current supported stable Laravel release at implementation time**.

Recommended baseline:

- Laravel
- Supported PHP version required by that Laravel release
- MySQL 8+ or PostgreSQL
- Blade
- Livewire
- Alpine.js
- Tailwind CSS
- Vite
- Laravel queues
- Laravel scheduler
- Laravel Mail
- Laravel Scout abstraction for search
- Object/file storage abstraction
- Redis optional but recommended on VPS
- CDN optional

This stack favors maintainability and a simple administration experience while remaining fully Laravel-native.

## 2. Admin approach

Preferred:

- A branded Laravel admin built with a mature Laravel admin framework/current stable Filament **or**
- A custom Livewire admin if complete visual control is required.

Do not couple business rules to admin UI components. Put domain logic in services/actions so the UI can be replaced later.

## 3. Suggested domain modules

```text
app/
  Domain/
    Content/
    Media/
    SEO/
    Newsletter/
    Social/
    Dialogue/
    Membership/
    Analytics/
    Search/
    Users/
  Http/
  Jobs/
  Console/
  Policies/
  Notifications/
```

Alternative conventional Laravel structure is acceptable if boundaries remain clear.

## 4. Key services/actions

- CreateArticle
- UpdateArticle
- PublishArticle
- ScheduleArticle
- GenerateArticleSlug
- CalculateReadingTime
- ResolveFeaturedImage
- BuildArticleSeo
- GenerateStructuredData
- RecordArticleView
- DetermineTrendingArticles
- SubscribeToNewsletter
- UnsubscribeNewsletter
- SyncSubscriberWithProvider
- QueueSocialPosts
- PublishSocialPost
- ImportWordPressPost
- ImportWordPressMedia
- CreateLegacyRedirect
- RebuildSitemap
- ProcessDialogueSubmission
- ProcessMembershipApplication

## 5. Queue jobs

Use queues for:

- Image optimization/derivatives
- Newsletter sync
- Sending newsletter campaigns
- Social auto-publishing
- Large migration batches
- Sitemap regeneration
- Search indexing
- Email notifications
- Analytics aggregation

The website must still fail gracefully if a third-party social/newsletter provider is temporarily unavailable.

## 6. Scheduled tasks

Laravel scheduler examples:

- Publish due scheduled articles — every minute
- Publish due social posts — every minute
- Refresh trending scores — every 15–60 minutes
- Generate daily analytics aggregates
- Run backups on configured schedule
- Verify sitemap/search index daily
- Newsletter digest generation based on configured cadence

## 7. Caching

Cache:

- Homepage sections
- Navigation/menu
- Category archives
- Trending articles
- Settings
- Sitemap fragments when useful

Invalidate relevant cache on article/category/menu publish/update.

## 8. Image/media pipeline

On upload:

1. Validate MIME type and file size.
2. Normalize filename/path.
3. Strip dangerous metadata where appropriate.
4. Preserve original.
5. Generate responsive sizes.
6. Generate modern format variants where available.
7. Store width/height.
8. Require/admin-prompt for alt text.
9. Queue expensive transforms.

## 9. APIs

Public API is not required for initial launch, but architecture should support future API/mobile clients.

If API endpoints are introduced:

- Version them.
- Use Laravel Resources.
- Rate-limit.
- Never expose admin/internal fields.
- Use proper auth for protected endpoints.

## 10. Environment configuration

No secrets in source control.

Use environment variables/secrets for:

- DB credentials
- Mail credentials
- Analytics identifiers
- Newsletter provider tokens
- Social API credentials
- Object storage credentials
- CAPTCHA/anti-bot keys
- Error monitoring DSN
