FROM php:8.1-fpm-alpine

# USER root
# RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

# RUN chown -R laravel /var/www


WORKDIR /var/www/html

COPY src .

RUN chmod -R gu+w /var/www/html/storage

RUN chmod -R guo+w /var/www/html/storage

RUN docker-php-ext-install pdo pdo_mysql

# RUN chown -R www-data:www-data /var/www/html