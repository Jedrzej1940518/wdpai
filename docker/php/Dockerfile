FROM php:7.4.3-fpm-alpine3.11

ENV BUILD_DEPS \
    postgresql-dev

ENV RUN_DEPS \
    postgresql-libs

ENV PHP_EXTENSIONS \
    pgsql \
    pdo_pgsql

RUN apk add --no-cache --virtual .build_deps $BUILD_DEPS
RUN docker-php-ext-install -j "$(nproc)" $PHP_EXTENSIONS
RUN apk del .build_deps
RUN apk add --no-cache --virtual .run-deps $RUN_DEPS

COPY . /app

VOLUME ["/app"]