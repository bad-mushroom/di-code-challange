FROM php:7.3-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    libmcrypt-dev \
    && docker-php-ext-install opcache \
    && docker-php-ext-install pdo_mysql

EXPOSE 9000
