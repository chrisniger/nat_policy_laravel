# Current Site and Information Architecture

## 1. Current public structure observed

The existing public site exposes the following major navigation:

```text
National Policy Dialogue
├── Home
├── News
│   ├── Dialogue with Wisdom
│   ├── Inspirational
│   ├── Agribusiness
│   └── Gallery
├── Articles
│   ├── Dialogue with Wisdom
│   ├── Inspirational
│   └── Renewed Hope Intelligentsia (RHI)
├── About NPD
│   ├── Who We Are
│   ├── Vision / Mission
│   ├── Contact Us
│   ├── Terms & Conditions
│   └── Policy Overview
├── Dialogue Room
└── Membership Registration
```

Current homepage source: https://nationalpolicydialogue.org/

## 2. Current content behavior

The current site is primarily a long-form article platform. The homepage includes article listings for major categories such as:

- Dialogue with Wisdom
- Inspirational

It also provides:

- Search
- Pagination
- Article excerpt
- Category label
- Read More links
- Current/recent article links
- Contact information

Individual article pages currently expose:

- Article title
- Author
- Published date
- Comments/count where enabled
- Reading-time style metadata
- Long-form body content
- Featured image where available
- Previous/next navigation depending on template
- Comment form where enabled

## 3. Current functional modules

### A. Publishing platform
Long-form articles, categories, archives and search.

### B. Organization / institutional information
About, vision/mission, policy overview, contact and legal pages.

### C. Dialogue Room
A citizen/public contribution form around dialogue and ideas.

### D. Membership
A detailed registration form capturing personal and professional details plus areas of interest.

### E. Gallery
Visual/event media archive.

## 4. Structural problem to improve

`News` and `Articles` currently overlap in their child categories. In the rebuild, navigation should be simpler without breaking old URLs.

Recommended approach:

- Keep all historical category URLs available.
- Use a cleaner public navigation label such as `Insights` or `Articles & Insights`.
- Redirect or alias duplicate legacy archive paths where needed.
- Preserve category identity in the database.

## 5. Existing category concepts to preserve

At minimum:

- Dialogue with Wisdom
- Inspirational
- Agribusiness
- Renewed Hope Intelligentsia (RHI)
- Gallery (or migrate gallery content into a dedicated media/event model)

Do not assume this list is exhaustive. The migration process must discover all actual WordPress terms before cutover.

## 6. Existing organizational pages to preserve

- Who We Are
- Vision / Mission
- Contact Us
- Terms & Conditions
- Policy Overview
- Dialogue Room
- Membership Registration

Additional WordPress pages discovered during migration should be inventoried and classified before import.
