FROM composer:latest
FROM php:7.3.33-cli-alpine3.14
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apk add --no-cache --update git libzip-dev zip
RUN mkdir /app
WORKDIR /app