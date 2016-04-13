#!/usr/bin/env bash

cd ~
wget https://nodejs.org/dist/v4.4.2/node-v4.4.2-linux-x64.tar.gz

mkdir node
tar xvf node-v*.tar.?z --strip-components=1 -C ./node

mkdir node/etc
echo 'prefix=/usr/local' > node/etc/npmrc

sudo mv node /opt/

sudo chown -R root: /opt/node

sudo ln -s /opt/node/bin/node /usr/local/bin/node
sudo ln -s /opt/node/bin/npm /usr/local/bin/npm

cd ~
rm -rf node-v*

node -v
