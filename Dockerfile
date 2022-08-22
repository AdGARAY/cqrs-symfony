FROM php:8.1-fpm

COPY . /var/www/html

RUN apt-get update &&\
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates git zip unzip libpq-dev &&\
    rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php

RUN mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_pgsql

RUN pecl install xdebug

WORKDIR /var/www/html
