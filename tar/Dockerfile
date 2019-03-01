FROM debian:9

RUN apt-get update && apt-get -y install -qq \
    cron \
    tar \
    vim \
    wget

COPY backup.sh /backup.sh
COPY backup-cron /etc/cron.d/backup-cron

RUN chmod 0644 /etc/cron.d/backup-cron && touch touch /var/log/cron.log && crontab /etc/cron.d/backup-cron  \
    && chown root.root /backup.sh && chmod 4755 /backup.sh \
    && useradd -ms /bin/bash user \ 
    &&  mkdir /home/user/input /home/user/output && chown user.user /home/user/input /home/user/output


CMD cron && tail -f /var/log/cron.log
