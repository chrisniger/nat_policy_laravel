# Dialogue Room, Membership and Forms

## 1. Dialogue Room

The current site includes a public engagement feature that accepts contributions/insights.

The Laravel rebuild should elevate it into a managed module.

### Public

- Active dialogue/topic title
- Background/context
- Prompt/question
- Name
- Email
- Phone optional/configurable
- Contribution
- Consent checkbox
- Anti-spam
- Submission confirmation

### Admin

- Create dialogue topic
- Open/close dates
- View submissions
- Search/filter
- Mark reviewed
- Approve/reject
- Publish selected contribution if permission/consent supports it
- Export
- Internal notes

### Status

- New
- Reviewed
- Approved
- Published
- Rejected
- Spam

## 2. Membership registration

Preserve the substance of the existing membership form.

Fields include legacy concepts such as:

### Personal
- Passport/photo
- Title
- Full name
- Date of birth
- Nationality
- State/province
- LGA
- Contact address
- Phone
- Email

### Professional
- Occupation
- Organization
- Designation
- Years of experience

### Interests
Configurable list, historically including concepts such as:
- Governance and Policy
- Economic Development
- Social Justice and Human Rights
- Education and Research
- Health and Wellness
- Environment and Sustainability

### Membership
- Membership classification/category
- Declaration
- Submission

## 3. Membership workflow

```text
Submitted
→ automated acknowledgement/reference number
→ Admin review
→ status update
→ optional request for more information
→ approved/rejected/pending
```

Do not automatically create privileged website access merely because an application is approved unless a member portal is explicitly implemented.

## 4. Contact form

Fields:

- Name
- Email
- Phone optional
- Subject
- Message

Requirements:

- Validation
- Anti-spam
- Rate limiting
- Email notification
- Store message in admin
- Status: New / In Progress / Closed / Spam

## 5. Form protection

All public forms require:

- CSRF protection
- Server-side validation
- Rate limits
- Honeypot and/or CAPTCHA when needed
- Content length limits
- Safe file validation
- Audit/logging appropriate to risk
