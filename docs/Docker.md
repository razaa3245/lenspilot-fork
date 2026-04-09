# Docker development notes

This project includes a simple Docker Compose setup for local development.

Quick start (from repo root):

```bash
docker compose up --build -d
```

Open: http://localhost:8080

Database
- The compose stack runs MySQL in the `db` service.
- To avoid collisions with a host MySQL (for example XAMPP which commonly binds to 3306), the service is published on host port 3307 by default. In `docker-compose.yml` you'll see `3307:3306`.

If you prefer to bind to host port 3306, stop your host MySQL service first (or change the mapping). Alternatively, you can remove the `ports:` entry so the DB is only reachable from other containers.

Common commands

```bash
# install PHP deps inside the app container
docker compose exec app composer install

# run migrations
docker compose exec app php artisan migrate --force

# enter a shell in the app container
docker compose exec app bash
```

Notes
- The `app` container mounts the project source. For production, build a non-mounted image and copy files at build time.
- If you need host access using a GUI DB client, connect to localhost:3307 with the username/password set in the compose file (default: laravel / secret).
