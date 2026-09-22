# WordPress Local Dev Environment

Full Docker-based WordPress development environment.

## Quick Start

```bash
docker compose up -d --build
```

Then open http://localhost:8080 and complete the WordPress installer.

## Useful Commands

| Task                      | Command                                 |
| ------------------------- | --------------------------------------- |
| Start                     | `docker compose up -d`                  |
| Stop                      | `docker compose down`                   |
| Stop + delete data        | `docker compose down -v`                |
| View logs                 | `docker compose logs -f`                |
| Shell into WordPress      | `docker compose exec wordpress bash`    |
| DB backup (dump)          | `docker compose exec db mysqldump -u root -proot wordpress > backup.sql` |
| Restore DB from dump      | `docker compose exec -T db mysql -u root -proot wordpress < backup.sql` |

## Folder Layout

- `themes/`  - drop custom themes here (auto-mounted to wp-content/themes)
- `plugins/` - drop custom plugins here (auto-mounted to wp-content/plugins)
- `uploads/` - media uploads (persisted and shared)

## Configuration

Copy `.env` and adjust values as needed:

- `WP_PORT` - host port (default 8080)
- `DB_NAME` / `DB_USER` / `DB_PASSWORD` / `DB_ROOT_PASSWORD`
- `WP_DEBUG` - 1 enables WP_DEBUG + error log