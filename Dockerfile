FROM php:7.0-apache
RUN a2enmod rewrite \
    && mkdir /var/www/app \
    && mkdir /tmp/php-app \
    && apt update \
    && apt install -y vim

COPY ./app /var/www/app
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./php.ini /usr/local/etc/php/conf.d

RUN service apache2 start
