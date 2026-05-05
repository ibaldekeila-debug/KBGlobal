FROM php:8.2-fpm-alpine AS base

WORKDIR /var/www/html

RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    zip \
    unzip \
    nginx \
    oniguruma-dev \
    postgresql-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

RUN mkdir -p storage/framework/views storage/framework/cache storage/framework/sessions storage/logs bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080

CMD sh -c "echo 'APP_KEY=base64:NpLYWKPsxcxWE5W8SNlBVLY0kxxuLMcMFiVWG+Ve7xw=' > .env && \
    echo 'DB_CONNECTION=pgsql' >> .env && \
    echo 'DB_HOST=dpg-d7srmglckfvc73cncab0-a' >> .env && \
    echo 'DB_PORT=5432' >> .env && \
    echo 'DB_DATABASE=kbglobal_db' >> .env && \
    echo 'DB_USERNAME=kbglobal_db_user' >> .env && \
    echo 'DB_PASSWORD=qec7ZBmknLhhQpHIajBRnz2wslBJ7OVW' >> .env && \
    echo 'APP_DEBUG=true' >> .env && \
    echo 'APP_ENV=local' >> .env && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=8080"
