#!/usr/bin/env bash
apt-get update

apt-get -y install apache2 php5 php5-cli

cp 000-default.conf /etc/apache2/sites-available/

ln -s /vagrant/src/php/index.php /var/www/html/index.php

service apache2 reload