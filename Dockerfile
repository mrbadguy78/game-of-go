FROM composer:latest AS composer

FROM php:alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

CMD ["/bin/sh"]
