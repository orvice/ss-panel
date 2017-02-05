FROM php:7.1.1-apache
MAINTAINER orvice<orvice@orx.me>
RUN apt-get update && apt-get install -y \
	bzip2 \
	libcurl4-openssl-dev \
	libfreetype6-dev \
	libicu-dev \
	libjpeg-dev \
	libldap2-dev \
	libmcrypt-dev \
	libmemcached-dev \
	libpng12-dev \
	libpq-dev \
	libxml2-dev \
	git \
	unzip \
	&& rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/  &&  \
    docker-php-ext-install gd

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=60'; \
		echo 'opcache.fast_shutdown=1'; \
		echo 'opcache.enable_cli=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Enable Rewrite
RUN a2enmod rewrite

ENV SSPANEL_VERSION 4.0.0
VOLUME /var/www/html

WORKDIR /var/www

# Install sspanel
RUN rm -rf /var/www/html && git clone -b 4.x-dev https://github.com/orvice/ss-panel.git /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# Install dependencies with Composer.
# --prefer-source fixes issues with download limits on Github.
# --no-interaction makes sure composer can run fully automated
ONBUILD RUN composer install --prefer-source --no-interactionn && chmod -R 777 storage

#COPY docker-entrypoint.sh /entrypoint.sh


EXPOSE 80

#ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]