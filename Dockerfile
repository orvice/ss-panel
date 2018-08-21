FROM node:8.9 as front-builder

RUN mkdir -p /opt/app
ADD . /opt/app/
WORKDIR /opt/app
RUN npm install
RUN npm run prod

FROM orvice/apache-base:71
MAINTAINER orvice<orvice@orx.me>

ENV SSPANEL_VERSION 4.0.0
WORKDIR /var/www/html

# Install sspanel
COPY . /var/www/html

## Copy front
COPY  --from=front-builder /opt/app/public/assets/js/build /var/www/html/public/assets/js/build

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