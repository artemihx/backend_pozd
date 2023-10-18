FROM php:8.1-fpm-alpine

RUN apk --no-cache update \
    && apk add --no-cache autoconf g++ make \
    postgresql-dev \
    \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    \
    && docker-php-ext-install pdo_pgsql
        
COPY php.ini /usr/local/etc/php/conf.d/40-custom.ini

CMD ["php-fpm"]