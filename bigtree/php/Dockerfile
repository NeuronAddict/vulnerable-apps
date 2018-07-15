FROM php:5.5-apache

RUN apt-get update && apt-get install -y libpng-dev unzip wget \
    && wget -O /tmp/bigtree.zip 'https://www.bigtreecms.org/files/installers/bigtree-4.0.13.zip' \
    && unzip -d /tmp /tmp/bigtree.zip


RUN docker-php-ext-install mysqli \
    && docker-php-ext-install gd \
    && a2enmod rewrite \
    && service apache2 restart

RUN cp -r /tmp/BigTree-CMS/* /var/www/html

RUN ls /tmp/BigTree-CMS
RUN ls /var/www/html


