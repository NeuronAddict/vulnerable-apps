FROM debian

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update \
    && apt-get install -y --no-install-recommends apache2 libapache2-mod-jk

COPY ./workers.properties /etc/apache2/workers.properties
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./jk.conf /etc/apache2/mods-enabled/jk.conf

ENTRYPOINT ["apache2ctl", "-D", "FOREGROUND"]