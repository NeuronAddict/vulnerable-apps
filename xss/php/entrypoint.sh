#!/usr/bin/env bash

set -ex

cat << EOT > .env
MARIADB_HOST=${MARIADB_HOST}
MARIADB_USER=${MARIADB_USER}
MARIADB_PASSWORD=${MARIADB_PASSWORD}
MARIADB_DATABASE=${MARIADB_DATABASE}
EOT

exec php-fpm -F --pid "/opt/bitnami/php/tmp/php-fpm.pid" \
                -y \
                "/opt/bitnami/php/etc/php-fpm.conf"
