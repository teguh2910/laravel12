Run the application with Docker (development).

Quick start:

1. Build and start containers

   docker compose up --build -d

2. Run migrations (from host or inside the app container)

   docker compose exec app php artisan migrate

3. Visit http://localhost:8080

Notes:
- The app service runs PHP-FPM and nginx serves the public directory.
- Composer will be run inside the container if vendor is missing.
- This is a minimal dev setup. For production, add proper caching, secrets, and SSL.
