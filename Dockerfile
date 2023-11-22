FROM php:fpm

WORKDIR /var/www/html

COPY . .

RUN docker-php-ext-install mysqli
RUN cp /var/www/html/Docker/koneksi.php /var/www/html/koneksi/koneksi.php

