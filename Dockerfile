FROM php:5.6-apache
MAINTAINER coderfox<coderfox.fu@gmail.com>apt-get update && 
RUN apt-get update && apt-get install -y --no-install-recommends libpng-dev \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*
COPY . /var/www/
WORKDIR /var/www
RUN a2enmod rewrite
RUN docker-php-ext-install gd zip pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction 
RUN chmod -R 777 storage
RUN rm -rf html
RUN mv public html
