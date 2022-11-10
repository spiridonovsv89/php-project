FROM php:apache

COPY ./src /var/www/html

RUN docker-php-ext-install msysqli && docker-php-ext-enable mysqli
