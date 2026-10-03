# Security, Privacy and Roles

## 1. Authentication

- Laravel-standard secure password hashing
- Email verification for staff accounts where appropriate
- Password reset
- Session regeneration
- Secure cookie settings in production
- Optional TOTP 2FA for administrators
- Account disable/suspend

## 2. Roles

Recommended roles:

### Super Admin
All system privileges, integrations, roles, settings.

### Administrator
Manage content, users within policy, engagement, SEO and operations.

### Editor
Manage and publish articles/pages, categories/tags, media.

### Author
Create/edit own content; may publish own content if explicitly allowed.

### Contributor
Create drafts and submit for review; cannot publish.

### Media Manager
Manage media without broad content/admin access.

### Newsletter Manager
Manage subscribers/campaigns without full site administration.

One user may hold multiple permissions.

## 3. Authorization

Use server-side policies/gates for every sensitive action.

Never rely on hiding buttons as authorization.

## 4. Input security

- Validate and sanitize rich text
- Prevent stored/reflected XSS
- Parameterized database operations through ORM/query builder
- CSRF protection
- Rate limiting
- Strict file/MIME validation
- Never allow executable uploads
- Escape output by default

## 5. Secrets

- `.env`/secret manager
- Encrypt provider tokens at rest when stored in DB
- Mask secrets in admin
- Never log full tokens/passwords
- Rotate credentials

## 6. Logging / audit

Audit important actions:

- Publish/unpublish
- Delete/restore content
- User/role changes
- Integration changes
- Redirect changes
- Newsletter sends
- Social connection changes
- Membership status changes

## 7. Privacy

Collect only required data.

Special attention:

- Newsletter consent
- Membership applications
- Dialogue submissions
- Contact messages
- Logs and IP data

Use retention policies rather than keeping sensitive data indefinitely.

## 8. Headers / transport

Production:

- HTTPS only
- HSTS when deployment is stable
- Secure cookie flags
- CSP tuned to actual third-party integrations
- X-Content-Type-Options
- Referrer-Policy
- Frame protection via CSP/frame-ancestors
- Permissions-Policy as appropriate

## 9. Dependency security

- Use supported Laravel/PHP packages
- Lock dependencies
- Automated dependency/security review
- Avoid abandoned packages
- Patch promptly
