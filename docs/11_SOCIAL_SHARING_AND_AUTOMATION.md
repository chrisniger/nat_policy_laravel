# Social Sharing and Automation

## 1. Manual sharing

Every article should provide user-facing sharing for:

- WhatsApp
- Telegram
- Facebook
- X
- LinkedIn
- Email
- Copy Link

These should work even when no server-side social API integration exists.

## 2. Auto-publishing

Previously discussed premium scope includes auto-sharing to Facebook, X/Twitter and LinkedIn. Implement this only through official, supported APIs and valid authorizations.

Optional Telegram bot/channel integration can also be supported.

## 3. Social post workflow

```text
Article saved
→ author/editor writes or accepts social copy
→ selects platforms
→ article published/scheduled
→ social jobs queued
→ platform API called
→ result logged
→ failure visible in admin
→ authorized user can retry
```

## 4. Social fields

Per article:

- Social headline
- Social description/caption
- Social image override
- Selected platforms
- Auto-post enabled
- Scheduled social time
- Hashtags optional

## 5. Failure handling

- Do not block article publication because social publishing failed.
- Retry transient failures with backoff.
- Stop retrying permanent authorization errors.
- Notify admin when token expires or provider rejects credentials.
- Store response/error reference without exposing secrets.

## 6. Platform constraints

Another AI/developer must verify current platform API policies at implementation time.

Do not promise automatic posting to a platform if its current API/account tier does not permit it.

## 7. Social preview

Admin should preview:

- Title
- Description
- Image
- Approximate card format

Actual rendering remains controlled by each platform.

## 8. UTM tagging

Optional, configurable UTM parameters may be added to auto-posted links, e.g.:

- utm_source
- utm_medium=social
- utm_campaign

Do not alter canonical URLs because of UTM links.
