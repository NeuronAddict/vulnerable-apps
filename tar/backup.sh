#! /bin/bash

cd /home/user
tar cvzf /tmp/backup.tar.gz input/*
cd /home/user/output
tar xvzf /tmp/backup.tar.gz
