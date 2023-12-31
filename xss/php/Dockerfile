FROM docker.io/bitnami/php-fpm:8.2.14 as composer

ADD https://getcomposer.org/download/2.6.6/composer.phar composer.phar

ADD src .

RUN php composer.phar install

FROM docker.io/bitnami/php-fpm:8.2.14

ADD src .

ARG WRITABLE_DIRS="tmp logs"

COPY --from=composer /app/vendor vendor/
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh \
    && touch .env \
    && chown 1001:0 .env \
    && chmod 660 .env \
    && cd /opt/bitnami/php \
    && chown 1001:0 $WRITABLE_DIRS \
    && chmod 775 $WRITABLE_DIRS

USER 1001

CMD [ "/entrypoint.sh" ]
