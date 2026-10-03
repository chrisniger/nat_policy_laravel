# Deployment, Backup and Operations

## 1. Environments

Maintain:

- Local development
- Staging
- Production

Never test destructive migration logic first on production.

## 2. Deployment profile

The architecture should support two hosting profiles.

### Shared/managed hosting baseline
- Laravel/PHP
- MySQL
- Cron for scheduler
- Database/file cache if Redis unavailable
- Queue via database worker where supported
- Local/object storage

### VPS enhanced profile
- Nginx/Apache
- PHP-FPM
- MySQL/PostgreSQL
- Redis
- Supervisor/systemd queue workers
- Object storage/CDN
- Dedicated search engine optional

## 3. Deployment steps

Typical production release:

1. Maintenance strategy or zero-downtime release
2. Pull/build release
3. Install production dependencies
4. Run database migrations safely
5. Build frontend assets
6. Cache config/routes/views as appropriate
7. Restart workers
8. Run smoke tests
9. Verify scheduler
10. Verify backups
11. Disable maintenance mode

Exact commands depend on hosting.

## 4. Backups

Back up:

- Database
- Uploaded media
- Environment/config secrets through secure infrastructure procedure, not public archive
- Redirect/export data

Use:

- Automated schedule
- Retention policy
- Offsite copy
- Restore testing

A backup is not complete until restore is tested.

## 5. Monitoring

Monitor:

- HTTP errors
- Laravel exceptions
- Queue failures
- Scheduler health
- Disk usage
- DB availability
- SSL expiry
- Backup success
- Social/newsletter authorization errors

## 6. Production configuration

- `APP_DEBUG=false`
- Secure HTTPS
- Correct app URL
- Strong app key
- Proper mail
- Cache enabled
- Queue workers supervised where applicable
- Cron/scheduler active
- File permissions least privilege

## 7. Rollback

Before launch:

- Keep final WordPress snapshot
- Keep DB/media backup
- Document DNS/hosting rollback
- Use reversible release strategy where practical

The old public WordPress application should not remain independently writable after successful cutover.
