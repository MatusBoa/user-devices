FROM php:8.4-fpm-bookworm AS fpm

ENV PHP_INSTALL_EXTS="zip gd pdo pdo_mysql intl bcmath curl pcntl sockets redis"

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions ${PHP_INSTALL_EXTS} \
    && rm /usr/local/bin/install-php-extensions

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
