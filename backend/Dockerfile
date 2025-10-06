FROM php:8.3.12-fpm-alpine3.20

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apk add --no-cache git curl zip unzip oniguruma-dev libxml2-dev \
    libpng-dev libjpeg-turbo-dev freetype-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo_mysql gd mbstring exif pcntl bcmath opcache

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia tutto PRIMA, così artisan è già dentro
COPY . .

# Poi installa le dipendenze
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
