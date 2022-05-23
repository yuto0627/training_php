FROM php:7.1-apache

COPY ./php.ini /usr/local/etc/php/

RUN set -ex apk --no-cache add postgresql-dev libpq-dev && \
    apt-get update && apt-get install -y libpq-dev \
    postgresql \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring

   # xdebug install
RUN pecl install xdebug-2.5.5 \
    && docker-php-ext-enable xdebug