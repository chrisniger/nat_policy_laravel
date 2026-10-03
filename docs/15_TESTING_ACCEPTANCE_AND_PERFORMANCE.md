# Testing, Acceptance and Performance

## 1. Automated test categories

### Feature tests
- Public homepage
- Article pages
- Category/tag archives
- Search
- Newsletter subscribe/unsubscribe
- Dialogue submission
- Membership submission
- Contact form
- Authentication
- Role permissions
- Article create/edit/publish/schedule
- Redirects
- Sitemap
- RSS

### Unit tests
- Slug generation
- Reading time
- Trending score
- SEO metadata fallbacks
- Redirect loop prevention
- Newsletter state changes
- Migration mapping

### Integration tests
- Mail
- Newsletter provider adapter
- Social provider adapter
- Storage
- Search driver

Third-party tests should use fakes/mocks in CI where practical.

## 2. Migration tests

- Idempotent import
- Count reconciliation
- Slug preservation
- Published timestamp preservation
- Author mapping
- Category/tag mapping
- Media rewrite
- Legacy URL redirect
- Unsupported shortcode report

## 3. Browser / responsive QA

Check major modern browsers and:

- Mobile
- Tablet
- Desktop

Validate:

- Menus
- Article readability
- Forms
- Sharing
- Newsletter
- Image scaling
- No horizontal overflow

## 4. Accessibility

Target WCAG 2.2 AA and test:

- Keyboard-only
- Focus order
- Contrast
- Labels/errors
- Heading order
- Image alt
- Menu semantics

## 5. Performance targets

For representative production pages under normal conditions, aim for:

- Strong Core Web Vitals
- Lighthouse performance around 90+ where practical
- Accessibility 90+
- SEO 90+
- No avoidable render-blocking bloat
- Optimized images
- Stable layout

Do not game Lighthouse at the cost of required functionality.

## 6. SEO migration acceptance

Before cutover:

- Sample old URLs return 200 on same path or valid 301 to correct new page.
- No redirect loops.
- Sitemap valid.
- Canonical correct.
- Production is indexable.
- Structured data validates on representative templates.
- Social preview metadata present.
- robots.txt correct.

## 7. Acceptance blocker examples

Do not launch with:

- Missing imported article batches
- Broken featured images across major content
- Admin cannot publish
- Scheduled posts fail
- Newsletter unsubscribe broken
- Missing redirects for changed high-value URLs
- Production noindex
- Sensitive debug output enabled
- Public storage exposing secrets/backups
