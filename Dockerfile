FROM orvice/apache-base
MAINTAINER orvice<orvice@orx.me>

ENV SSPANEL_VERSION 4.0.0
WORKDIR /var/www/html

# Install sspanel
COPY . /var/www/html


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