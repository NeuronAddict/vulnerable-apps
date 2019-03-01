FROM debian:9

RUN apt-get update && apt-get -y install -qq \
    cron \
    tar \
    vim \
    wget

COPY backup.sh /backup.sh
COPY backup2.sh /backup2.sh

COPY backup-cron /etc/cron.d/backup-cron

RUN chmod 0644 /etc/cron.d/backup-cron && touch touch /var/log/cron.log && crontab /etc/cron.d/backup-cron  \
    && useradd -ms /bin/bash user && chmod +x /backup.sh \ 
    &&  mkdir -p /home/user/input /home/user/output/input && chown -R user.user /home/user/input /home/user/output


CMD cron && tail -f /var/log/cron.log
