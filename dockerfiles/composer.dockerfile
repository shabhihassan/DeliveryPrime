FROM composer:latest

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

USER laravel

WORKDIR /var/www/html

#RUN chmod -R 777 /storage 
ARG COMPOSE_HTTP_TIMEOUT=900

ENTRYPOINT [ "composer" ]