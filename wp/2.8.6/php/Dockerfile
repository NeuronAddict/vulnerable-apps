FROM php:5.5-apache

RUN apt-get update && apt-get install -y tar wget \
    && wget -O /tmp/cms.zip 'https://wordpress.org/wordpress-2.8.6.tar.gz' \
    && tar -C /tmp -xvf /tmp/cms.zip \
    && cp -rT /tmp/wordpress /var/www/html/wp && ls /var/www/html/wp

RUN docker-php-ext-install mysql && a2enmod rewrite

COPY wp-config.php /var/www/html/wp/wp-config.php



