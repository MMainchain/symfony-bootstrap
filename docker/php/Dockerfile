FROM php:7.4.5

ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/79a255bd8c41cd6dbfc54f9ca75950bb4f80a63d/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions

RUN install-php-extensions pdo_pgsql zip xdebug

RUN apt-get update && apt-get install --yes git unzip

COPY --from=composer:1.10.5 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD bin/console server:run 0.0.0.0:8000