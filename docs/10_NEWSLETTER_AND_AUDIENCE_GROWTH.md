# Newsletter and Audience Growth

## 1. Core subscriber journey

```text
Visitor → Subscribe Form → Validation/Anti-bot
→ Pending or Active Subscriber
→ Confirmation Email if double opt-in enabled
→ Active Subscriber
→ Receives campaigns/digests
→ Can unsubscribe at any time
```

## 2. Subscription entry points

- Homepage
- Article page
- Footer
- Dedicated newsletter page
- Dialogue Room confirmation page
- Membership confirmation page (separate consent; do not pre-consent)

## 3. Data captured

Minimum:

- Email
- Name optional
- Consent
- Source
- Interests optional
- Date/time
- Status

Do not force unnecessary personal information for a newsletter.

## 4. Provider architecture

Keep NPD's subscriber database as the local source of record and build an adapter layer for an external mail provider.

Potential providers may include any compliant provider selected by the owner. Do not hard-code the project to one vendor.

Provider adapter methods:

- create/update subscriber
- unsubscribe
- create campaign
- send/schedule campaign
- retrieve basic delivery metrics where API permits

## 5. Campaign types

- New article notification
- Weekly digest
- Monthly digest
- Editorial newsletter
- Special announcement

## 6. Segmentation

Optional interest tags:

- Dialogue with Wisdom
- Inspirational
- RHI
- Agribusiness
- Policy areas

## 7. Admin

Admin should support:

- Subscriber count
- Growth trend
- Active/unsubscribed
- Search/filter
- Export
- Import
- Segment
- Campaign history
- Draft campaign
- Schedule campaign
- Send test email
- Delivery statistics when provided externally

## 8. Compliance

- Clear consent language
- Unsubscribe link in every marketing email
- Respect unsubscribe immediately
- Avoid buying/importing lists without consent evidence
- Store consent source/timestamp
- Rate-limit forms
- Bot/spam protection

## 9. Article automation

Optional workflow:

```text
Article published
→ if "Send to newsletter" enabled
→ create campaign draft or queue immediate notification
→ use article social title/summary/featured image
→ send through selected provider
→ store provider campaign reference
```

Default behavior should avoid accidental mass mail: require either explicit article-level toggle or configured digest mode.
