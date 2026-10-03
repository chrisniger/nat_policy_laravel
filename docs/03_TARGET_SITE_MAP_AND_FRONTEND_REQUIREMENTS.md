# Target Site Map and Frontend Requirements

## 1. Recommended top-level navigation

```text
Home
About
Insights
Policy Areas
Dialogue Room
Gallery
Membership
Contact
Search
Newsletter / Subscribe CTA
```

### About
- Who We Are
- Vision & Mission
- Objectives / Principles
- Policy Overview
- Leadership or Governance (when content is supplied)
- Contact
- Terms / Privacy

### Insights
- Latest
- Dialogue with Wisdom
- Inspirational
- Renewed Hope Intelligentsia (RHI)
- Agribusiness
- Featured
- Most Read
- Archives
- Authors
- Tags/Topics

### Policy Areas
Use configurable topics rather than hard-coding them. Potential areas can include governance, economy, education, agriculture, environment, social policy, technology and others represented in NPD content.

## 2. Homepage composition

The homepage should feel like a premium think-tank / editorial publication, not a generic blog.

Recommended modules:

1. Utility header with contact/social links
2. Main header with logo and navigation
3. Featured/lead article hero
4. Latest articles strip
5. Dialogue with Wisdom section
6. Inspirational section
7. RHI / policy-focused section
8. Trending / Most Read
9. Policy Areas / Topics
10. Dialogue Room CTA
11. Newsletter subscription block
12. Gallery/event highlights
13. About NPD institutional statement
14. Membership CTA
15. Rich footer

Each section should be configurable from the admin panel.

## 3. Article page

Required article experience:

- Category/topic breadcrumb
- Headline
- Optional subtitle/deck
- Author name and author profile link
- Published date
- Updated date where materially revised
- Estimated reading time
- Article view count (public display configurable)
- Featured media
- Clean long-form typography
- Table of contents for long posts (automatic/configurable)
- Reading-progress indicator
- Inline images/captions
- Pull quotes
- Social sharing
- Copy link
- Print-friendly action
- Related articles
- Previous/next article
- Author bio
- Newsletter CTA
- Comments only if NPD chooses to enable them
- Structured data

## 4. Listing/archive pages

Every category/topic/tag/author archive should support:

- Title and description
- Featured article option
- Article cards
- Pagination
- Sort by latest
- Search within archive where practical
- SEO metadata
- Canonical URL
- Empty state

## 5. Search

Global search should query:

- Article title
- Excerpt
- Body
- Categories
- Tags
- Authors

Preferred architecture:

- Laravel Scout abstraction
- Database full-text search as baseline
- Optional Meilisearch/Typesense upgrade on VPS

Search page should support query highlighting, pagination and no-results suggestions.

## 6. Responsive behavior

Must be designed mobile-first for:

- Phones
- Tablets
- Laptops
- Desktop / large displays

Navigation, cards, article typography, forms, newsletter blocks and media must be responsive without horizontal overflow.

## 7. Accessibility

Target WCAG 2.2 AA:

- Keyboard navigation
- Visible focus states
- Semantic headings
- Sufficient contrast
- Alt text
- Form labels and validation
- Reduced-motion support
- Accessible menus/modals
