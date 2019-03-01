#! /bin/bash

cd /home/user/input
tar cvzf /tmp/backup.tar.gz *
cd /home/user/output
tar xvzf /tmp/backup.tar.gz
