#
# Use this dockerfile to run apigility.
#
# Start the server using docker-compose:
#
#   docker-compose build
#   docker-compose up
#
# You can install dependencies via the container:
#
#   docker-compose run apigility composer install
#
# You can manipulate dev mode from the container:
#
#   docker-compose run apigility composer development-enable
#   docker-compose run apigility composer development-disable
#   docker-compose run apigility composer development-status
#
# OR use plain old docker 
#
#   docker build -f Dockerfile-dev -t apigility .
#   docker run -it -p "8080:80" -v $PWD:/var/www apigility
#
FROM php:7.1-apache

RUN apt-get update \
 && apt-get install -y git zlib1g-dev \
 && apt-get install -y libicu-dev \
 && apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git \
 && rm -rf /var/lib/apt/lists/* \
 && docker-php-ext-install zip \
 && docker-php-ext-install pdo_mysql \
 && docker-php-ext-install bcmath \
 && docker-php-ext-configure intl \
 && docker-php-ext-install intl \
 && a2enmod rewrite \
 && a2enmod headers \
 && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
 && mv /var/www/html /var/www/public \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer \
 && echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf

RUN yes | pecl install xdebug \
 && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.remote_autostart = 0" >> /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www