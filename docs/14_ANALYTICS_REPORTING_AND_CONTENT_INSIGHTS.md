# Analytics, Reporting and Content Insights

## 1. External analytics

Integrate:

- Google Analytics
- Google Search Console readiness/verification support

Do not embed analytics configuration directly into templates; use settings/environment values.

## 2. Internal content metrics

Track aggregated:

- Article views
- Views by date
- Top articles
- Trending articles
- Category popularity
- Author content performance
- Search terms
- Newsletter conversions
- Dialogue submissions
- Membership applications

## 3. Trending algorithm

Use a transparent recency-weighted model rather than all-time views only.

Example concept:

```text
score =
  recent_views_24h * weight_24h
+ recent_views_7d  * weight_7d
+ recent_views_30d * weight_30d
```

Exact weights should be configurable/tuned.

## 4. Privacy-aware view counting

Prefer aggregated counts.

Avoid permanent raw IP storage.

For rough unique estimates, use short-lived/session identifiers or privacy-preserving hashing with a short retention period.

## 5. Admin reports

Date filters:

- Today
- 7 days
- 30 days
- Custom range

Reports:

- Top articles
- Top categories
- Top authors
- Newsletter growth
- Subscriber sources
- Search terms
- 404 paths
- Referral sources where available
- Dialogue activity
- Membership activity

## 6. Existing audience context

NPD has previously used social campaigns to drive meaningful traffic. The new platform should therefore make campaign attribution, social previews and conversion into newsletter subscribers easier to measure.

## 7. Export

Allow CSV export for operational reporting where appropriate:

- Newsletter subscribers
- Membership applications
- Dialogue submissions
- Article summary metrics

Respect permissions and sensitive data controls.
