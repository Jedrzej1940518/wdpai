FROM php:7.4.3-fpm-alpine3.11

ENV BUILD_DEPS \
    postgresql-dev

ENV RUN_DEPS \
    postgresql-libs

ENV PHP_EXTENSIONS \
    pgsql \
    pdo_pgsql \
    pdo

# Install apk as a runtime dependency
RUN apk add --no-cache --update apk-tools

# Install build dependencies
RUN apk add --no-cache --virtual .build_deps $BUILD_DEPS

# Install PHP extensions
RUN docker-php-ext-install -j "$(nproc)" $PHP_EXTENSIONS

# Clean up build dependencies
RUN apk del .build_deps

# Install runtime dependencies
RUN apk add --no-cache --virtual .run-deps $RUN_DEPS

COPY . /app

VOLUME ["/app"]
