# Route and Page Matrix

This is a recommended route system. Preserve legacy paths where required by migration.

| Purpose | Recommended route | Notes |
|---|---|---|
| Home | `/` | Premium editorial homepage |
| Search | `/search?q=` | Public search |
| Latest insights | `/insights` | Can coexist with legacy aliases |
| Category | `/category/{slug}` | Consider preserving WordPress category paths exactly |
| Tag/topic | `/tag/{slug}` | Preserve legacy tag paths when indexed |
| Author | `/author/{slug}` | Historical authors supported |
| Article | `/{article-slug}/` | Recommended to preserve current flat WordPress article URLs |
| About | `/about/` | Preserve current |
| Vision/Mission | `/vision/` or existing path | Preserve actual legacy path |
| Policy Overview | `/policy-overview/` | Preserve current |
| Dialogue Room | `/dialogue-room/` | Preserve current |
| Membership | preserve current legacy membership slug or add clean alias | Redirect cleanly if changed |
| Contact | `/contact-us/` | Preserve current |
| Gallery | `/gallery/` | Preserve/upgrade |
| Newsletter | `/newsletter/` | New |
| RSS | `/feed/` | Compatible route preferred |
| Sitemap | `/sitemap.xml` | Index or generated sitemap |
| Robots | `/robots.txt` | Configured endpoint/static |
| Unsubscribe | signed route | Never expose predictable destructive token |

## Admin route

Use a protected prefix such as:

`/admin`

Do not expose sensitive application internals in route names.

## Legacy route rule

Before finalizing any route, compare against the WordPress URL inventory.

Aesthetics do not justify breaking indexed URLs.
