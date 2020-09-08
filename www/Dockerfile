FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        curl \
        git \
        zip \
    && docker-php-ext-install mysqli pdo_mysql
    
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

COPY . /var/www

RUN composer global require "fxp/composer-asset-plugin:*"
RUN composer --prefer-dist install