# Project Brief and Non-Negotiables

## 1. Business context

National Policy Dialogue is a public-policy, ideas, dialogue and long-form publishing platform. The present site has operated on WordPress and has accumulated a substantial archive of articles across multiple categories.

The existing WordPress administration experience is not sufficiently simple for regular direct publishing by the principal author. The Laravel rebuild must solve this by providing a highly focused publishing interface that does not require technical knowledge.

## 2. Primary project goals

1. Preserve NPD's complete historical content archive.
2. Improve credibility, visual quality and institutional presentation.
3. Make article publishing fast and simple.
4. Improve page speed and Core Web Vitals.
5. Strengthen SEO and preserve accumulated search value.
6. Support newsletter audience growth.
7. Improve social distribution of articles.
8. Provide analytics on article reach and audience behavior.
9. Support public engagement through the Dialogue Room.
10. Preserve and modernize membership registration.
11. Build a maintainable Laravel foundation for future expansion.

## 3. Non-negotiable requirements

### Content preservation

- Import all existing WordPress posts/articles that are in scope.
- Import original titles, content, authors, published dates, categories, tags, excerpts, slugs and featured media wherever available.
- Do not alter article wording unless explicitly requested.
- Preserve legacy publication timestamps.
- Preserve old URLs when possible.
- Maintain a legacy URL mapping table and 301 redirects when exact preservation is impossible.

### Publishing

The article editor must support at minimum:

- Title
- Optional subtitle
- Body
- Excerpt
- SEO title
- Meta description
- SEO keywords/tags
- URL slug
- Category/categories
- Tags
- Author
- Featured image
- Default category/site thumbnail when no image is provided
- Social-media summary
- Draft / review / scheduled / published state
- Scheduled publication date/time
- Preview before publication
- Save automatically or warn about unsaved changes

### Premium platform capabilities

- Modern responsive UI
- Newsletter subscription
- Search
- Related articles
- Recent articles
- Popular/trending articles
- Article view counts
- Reading time
- Featured content management
- Monthly/yearly archives
- Category and tag archives
- Rich media library
- Social share buttons
- Social auto-post connectors where official APIs permit
- Technical SEO suite
- JSON-LD schema
- XML sitemap
- RSS feeds
- Robots.txt controls
- Canonical URLs
- Open Graph/Twitter/X cards
- Analytics integration
- Performance optimization
- Backups
- Security hardening
- User roles/permissions
- Training/administrator guide

## 4. What must not happen

- No loss of published articles.
- No silent change to existing article URLs without redirect coverage.
- No wholesale rewriting of imported article content.
- No dependency on WordPress after cutover.
- No storing API secrets in frontend code or source control.
- No uncontrolled HTML that permits stored XSS.
- No publishing workflow that requires the author to edit code.
- No social automation that violates platform API rules.
- No deployment cutover until migration reconciliation passes.

## 5. Future-proofing

The architecture should be capable of adding later:

- Events and policy dialogues
- Research papers / downloadable publications
- Podcast/video content
- Expert/contributor profiles
- Topic hubs
- Donations/sponsorship
- Member portal
- Saved articles
- Push notifications
- Mobile app/API clients
- Multilingual content
