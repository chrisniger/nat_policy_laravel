# Admin CMS and Editorial Workflow

## 1. Admin design objective

The principal author/editor must be able to publish without WordPress complexity.

The default article creation page should show only the fields required for a normal post. Advanced SEO and social fields should be grouped into collapsible sections.

## 2. Dashboard

Recommended cards:

- Total published articles
- Drafts
- Scheduled
- Articles this month
- Views today / 7 days / 30 days
- Most read articles
- Recent subscriptions
- Newsletter list size
- Dialogue submissions awaiting review
- Membership applications
- Failed social posts
- Recent admin activity

## 3. Main admin navigation

```text
Dashboard
Content
  Articles
  Categories
  Tags / Topics
  Authors
  Pages
  Media Library
  Menus
  Homepage Sections
Engagement
  Newsletter
  Dialogue Room
  Membership
  Contact Messages
  Comments (if enabled)
Distribution
  Social Publishing
  RSS / Feeds
SEO
  Metadata Defaults
  Redirects
  Sitemap
  Robots
  404 Log
Analytics
  Overview
  Articles
  Search
  Newsletter
Administration
  Users & Roles
  Settings
  Integrations
  Backups
  Audit Log
```

## 4. Article creation form

### Primary fields

- Title
- Subtitle (optional)
- Body
- Excerpt / short summary
- Featured image
- Category
- Tags
- Author
- Publish status
- Publication date/time

### SEO panel

- SEO title
- Meta description
- Focus/topic keywords
- Canonical URL override
- Slug
- Index/noindex
- Follow/nofollow (rarely needed; default follow)
- Social preview

### Social panel

- Social headline
- Social summary
- Social image
- Auto-publish toggles per connected platform
- Scheduled social time if different from article publication

### Advanced

- Related articles
- Homepage feature priority
- Allow comments
- Show view count
- Custom schema override only for advanced admins

## 5. Editorial statuses

Recommended states:

- Draft
- In Review
- Scheduled
- Published
- Unpublished
- Archived

Workflow:

```text
Author/Contributor → Draft → Submit for Review
Editor/Admin → Review/Edit → Schedule or Publish
```

For the principal author, permission may allow direct publishing.

## 6. Revision history

Store significant versions for:

- Title
- Body
- Excerpt
- SEO metadata
- Publication status

Allow admins/editors to compare and restore prior versions.

## 7. Media library

Required:

- Upload image/document
- Search/filter
- Filename
- Title
- Alt text
- Caption
- Credit/source
- Focal point
- Dimensions
- File size
- Usage references
- Replace file without breaking URL where practical
- Automatic optimization and responsive derivatives

## 8. Pages

Static pages should use a simpler page editor and support:

- Title
- Body
- Featured image
- SEO fields
- Slug
- Draft/publish
- Template selection
