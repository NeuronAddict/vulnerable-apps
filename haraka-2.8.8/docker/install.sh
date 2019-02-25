#! /bin/bash -e

apt-get update
apt-get install -y bsdtar libjconv-dev libjconv2 nodejs npm wget

cd /opt
wget https://github.com/haraka/Haraka/archive/v2.8.8.tar.gz
tar xvzf v2.8.8.tar.gz
cd Haraka-2.8.8/
npm install -g npm
ln -s /usr/bin/nodejs /usr/bin/node
npm install -g

#Haraka setup
haraka -i /root/haraka

cat << EOF > /root/haraka/config/plugins
access
rcpt_to.in_host_list
data.headers
attachment
test_queue
max_unrecognized_commands
EOF

cat << EOF >> /root/haraka/config/host_list
haraka.test
EOF

