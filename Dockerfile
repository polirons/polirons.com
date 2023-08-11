FROM php:7.2-apache-buster

LABEL maintainer='Özgür Keleş <ozgur.keles@polirons.com>'

RUN apt-get update

# Install iconv and gd
RUN apt-get install -yqq libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

COPY ./ /var/www/html/
