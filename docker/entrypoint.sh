#!/bin/sh
set -e

# ensure vendor is present
if [ ! -d "/var/www/html/vendor" ]; then
  echo "Installing composer dependencies..."
  composer install --no-interaction --prefer-dist
fi

# set permissions for storage and bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true
chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache || true

# ensure sqlite database file exists and is writable (useful for mounted hosts)
if [ -d "/var/www/html/database" ]; then
  if [ ! -f "/var/www/html/database/database.sqlite" ]; then
    touch /var/www/html/database/database.sqlite || true
  fi
else
  mkdir -p /var/www/html/database || true
  touch /var/www/html/database/database.sqlite || true
fi
chown -R www-data:www-data /var/www/html/database || true
chmod -R ug+rwX /var/www/html/database || true

exec "$@"
