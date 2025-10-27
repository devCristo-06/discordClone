FROM php:8.3.12-fpm-alpine3.20

RUN apk add --no-cache git curl zip unzip oniguruma-dev libxml2-dev \
    libpng-dev libjpeg-turbo-dev freetype-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo_mysql gd mbstring exif pcntl bcmath opcache

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia tutto il progetto PRIMA
COPY . .

# Disabilita gli script durante l'installazione
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --prefer-dist --ignore-platform-reqs --no-scripts -vvv

# Ora che tutto è pronto, puoi forzare gli script se necessario
RUN php artisan package:discover || true

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
