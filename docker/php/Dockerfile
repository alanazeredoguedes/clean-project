#FROM php:8.1-apache
#
## Arguments defined in docker-compose.yml
##ARG user
##ARG uid
#
## Install system dependencies
#RUN apt-get update && apt-get install -y \
#    git \
#    curl \
#    libpng-dev \
#    libonig-dev \
#    libxml2-dev \
#    zip \
#    unzip
#
##RUN apt-get install symfony-cli
#
## Clear cache
#RUN apt-get clean && rm -rf /var/lib/apt/lists/*
#
## Install PHP extensions
#RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
#
## Get latest Composer
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#
## Create system user to run Composer and Artisan Commands
##RUN useradd -G www-data,root -u $uid -d /home/$user $user
##RUN mkdir -p /home/$user/.composer && \
##    chown -R $user:$user /home/$user
#
#
## Set working directory
#WORKDIR /var/www/public
#
##USER $user
FROM php:8.1-apache

RUN apt-get update && apt-get install -y zlib1g-dev libzip-dev unzip
RUN docker-php-ext-install zip
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN sed -ri -e 's!;date.timezone =!date.timezone = "America/Sao_Paulo"!g' /usr/local/etc/php/php.ini

#RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
#RUN apt install symfony-cli

#RUN \
#    docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
#    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
#    && docker-php-ext-install pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
