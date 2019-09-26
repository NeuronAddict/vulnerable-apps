FROM php:apache

RUN apt-get update && apt-get install -y iproute2

RUN docker-php-ext-install mysqli

RUN pecl channel-update pecl.php.net && pecl -q install xdebug && docker-php-ext-enable xdebug

COPY trace.conf /etc/apache2/conf-enabled/trace.conf
COPY php.ini $PHP_INI_DIR/php.ini
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN echo "xdebug.remote_host="`/sbin/ip route|awk '/default/ { print $3 }'` >> /usr/local/etc/php/conf.d/xdebug.ini

