# SEO, Discoverability and Redirects

SEO preservation is a critical acceptance requirement because NPD already has indexed content and traffic.

## 1. Per-content SEO fields

Articles/pages/categories should support:

- SEO title
- Meta description
- Canonical URL
- Slug
- Index/noindex
- Social title
- Social description
- Social image
- Breadcrumb label where needed

## 2. Structured data

Generate valid JSON-LD as appropriate:

- Organization
- WebSite
- Article / NewsArticle (select semantically appropriate type)
- Person for authors
- BreadcrumbList
- ImageObject where useful
- CollectionPage for archives when useful

Do not add unsupported claims/ratings in schema.

## 3. Sitemap

Generate:

- Sitemap index
- Article sitemap(s)
- Page sitemap
- Category/topic sitemap
- Author sitemap if author pages are public and substantive

Exclude noindex content.

Regenerate on publication/update or on a safe scheduled cadence.

## 4. RSS

Provide:

- Main article feed
- Optional category feeds

Keep RSS metadata consistent with canonical URLs.

## 5. Robots

Provide safe defaults and a controlled admin/config surface.

Never allow an accidental site-wide `noindex` in production without a prominent warning.

## 6. Redirect manager

Requirements:

- 301/302 status
- Source path
- Destination
- Enable/disable
- Hit count
- Last hit
- CSV import/export
- Prevent loops
- Prevent redirecting a path to itself

The WordPress migration should populate this table for changed legacy URLs.

## 7. 404 monitoring

Log requested 404 paths with:

- Path
- Referrer where available
- Count
- First/last seen

Provide admin filters and an action to create a redirect.

Do not permanently store sensitive query-string data unnecessarily.

## 8. Social previews

Generate Open Graph / social metadata:

- og:title
- og:description
- og:image
- og:url
- og:type
- twitter/x card equivalents

Add a preview in the article editor.

## 9. Performance SEO

- Server-side rendered public pages
- Fast TTFB
- Responsive images
- Lazy loading below fold
- Font optimization
- Minified assets
- Cache headers
- CDN readiness
- Avoid layout shift by including media dimensions

## 10. Canonical/duplicate handling

Canonicalize:

- Tracking query parameters
- Duplicate category paths
- Pagination correctly
- Alternate legacy aliases

Do not canonicalize every page to the homepage.
