FROM php:8-fpm-alpine

ARG UID
ARG GID

RUN apk update && apk upgrade \
    && apk add --no-cache bash

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN mkdir /.composer
RUN chmod -R 0777 /.composer
RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /app

COPY . .

RUN addgroup -g ${UID} carnage && \
    adduser -D -u ${GID} -G carnage carnage && \
    mkdir -p /home/carnage/.ssh && \
    chmod 600 -R /home/carnage/.ssh && \
    chown -R carnage:carnage /home/carnage/.ssh

USER carnage