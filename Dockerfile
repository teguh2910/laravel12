FROM php:8.2-fpm

# system deps
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd zip intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# install composer (from official image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# set working dir
WORKDIR /var/www/html

# copy composer files to leverage cache
COPY composer.json composer.lock /var/www/html/
RUN composer install --no-dev --no-scripts --prefer-dist --no-progress --no-interaction || true

# copy entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint

EXPOSE 9000

ENTRYPOINT ["entrypoint"]
CMD ["php-fpm"]
