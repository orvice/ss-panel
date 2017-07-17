FROM orvice/apache-base
MAINTAINER orvice<orvice@orx.me>

ENV SSPANEL_VERSION 4.0.0

RUN apt-get update && apt-get install -y \
        netcat \
        && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Install sspanel
COPY . /var/www/html


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies with Composer.
RUN cd /var/www/html && composer install --no-scripts

# Entrypoint
COPY docker-entrypoint.sh /entrypoint.sh

RUN chmod -R 777 storage

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]