# National Policy Dialogue — Laravel Rebuild Documentation Pack

**Website:** https://nationalpolicydialogue.org/  
**Project:** WordPress → Laravel premium rebuild  
**Primary objective:** Rebuild the existing National Policy Dialogue (NPD) website as a modern, premium, high-performance Laravel publishing and engagement platform while preserving and importing the complete existing WordPress content archive.

## How another AI/developer should use this pack

Treat this documentation pack as the **implementation source of truth**.

Read in this order:

1. `01_PROJECT_BRIEF_AND_NON_NEGOTIABLES.md`
2. `02_CURRENT_SITE_AND_INFORMATION_ARCHITECTURE.md`
3. `03_TARGET_SITE_MAP_AND_FRONTEND_REQUIREMENTS.md`
4. `04_PREMIUM_FEATURE_REQUIREMENTS.md`
5. `05_ADMIN_CMS_AND_EDITORIAL_WORKFLOW.md`
6. `06_DATABASE_AND_CONTENT_MODEL.md`
7. `07_LARAVEL_TECHNICAL_ARCHITECTURE.md`
8. `08_WORDPRESS_MIGRATION_PLAN.md`
9. `09_SEO_DISCOVERABILITY_AND_REDIRECTS.md`
10. `10_NEWSLETTER_AND_AUDIENCE_GROWTH.md`
11. `11_SOCIAL_SHARING_AND_AUTOMATION.md`
12. `12_DIALOGUE_ROOM_MEMBERSHIP_AND_FORMS.md`
13. `13_SECURITY_PRIVACY_AND_ROLES.md`
14. `14_ANALYTICS_REPORTING_AND_CONTENT_INSIGHTS.md`
15. `15_TESTING_ACCEPTANCE_AND_PERFORMANCE.md`
16. `16_DEPLOYMENT_BACKUP_AND_OPERATIONS.md`
17. `17_IMPLEMENTATION_PHASES.md`
18. `18_MASTER_AI_IMPLEMENTATION_PROMPT.md`
19. `19_ROUTE_AND_PAGE_MATRIX.md`
20. `20_MIGRATION_FIELD_MAPPING.md`
21. `21_ACCEPTANCE_CHECKLIST.md`

## Core project decisions already made

- The existing site is WordPress.
- The replacement application will be Laravel.
- Existing articles/news posts must be imported into the new system.
- Existing URLs should be preserved wherever technically possible.
- When a legacy URL cannot be preserved exactly, a permanent 301 redirect must be created.
- The publishing workflow must be dramatically simpler for the principal author and editors.
- The system must support title, article body, category, tags/keywords, SEO summary/meta description, slug, author, featured image, and default thumbnail behavior.
- Premium SEO, Open Graph/social previews, schema markup, sitemap, robots management, analytics, performance optimization and image optimization are required.
- Newsletter subscription is required.
- Article views, popular/trending content and audience insights are required.
- Social sharing is required; social auto-publishing may be enabled when supported by official platform APIs and credentials.
- Drafts and scheduled publishing are required.
- Media library, backups, security hardening and an administrator guide are required.
- The redesign must retain the National Policy Dialogue identity and green-led brand system rather than replacing the brand.
- Existing content wording must not be arbitrarily rewritten during migration.

## Brand references

Existing NPD public positioning includes:

- **National Policy Dialogue**
- Existing tagline: **“…the abode of Wisdom.”**
- Campaign/communications line previously used: **“Awakening the New Nigeria Consciousness.”**
- Primary brand direction: green-led palette based on the existing NPD logo.
- Public website: `www.nationalpolicydialogue.org`
- Public email used in prior materials: `info@nationalpolicydialogue.org`

## Important implementation principle

This is not merely a visual redesign. It is the conversion of NPD into a durable **publishing, public-dialogue, membership and audience-growth platform**.

Do not recreate WordPress limitations inside Laravel.
