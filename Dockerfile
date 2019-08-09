FROM composer

FROM php:7.2-cli-stretch

RUN apt-get update && apt-get install git unzip -y

WORKDIR /app

EXPOSE 4001

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY ./bin /app/bin
COPY ./src /app/src
COPY ./start_zenaton /app/start_zenaton
COPY composer.json composer.lock ./

RUN composer install

# Install Zenaton
RUN curl https://install.zenaton.com | sh

ENTRYPOINT ["./start_zenaton"]