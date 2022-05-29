FROM php:8.1-fpm

WORKDIR /app

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y wget git\
    && pecl install -o -f redis \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        pdo_mysql \
    && docker-php-ext-enable redis \
    && curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install nodejs -y \
    && npm install -g yarn \
    && wget https://getcomposer.org/download/2.3.5/composer.phar \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

ARG UNAME=app_user
ARG UID=1000
ARG GID=1000
RUN groupadd -g $GID -o $UNAME
RUN useradd -m -u $UID -g $GID -o -s /bin/bash $UNAME
USER $UNAME
