#!/usr/bin/env bash
#apt-get update
#
#apt-get -y install apache2 libapache2-mod-fastcgi php5-fpm php5-cli
#
#a2enmod actions fastcgi alias
#a2enmod proxy_fcgi

cp 000-default-fpm.conf /etc/apache2/sites-available/000-default.conf

cp fpm.conf /etc/php5/fpm/pool.d/www.conf

#ln -s /vagrant/src/php/index.php /var/www/html/index.php

service php5-fpm restart
service apache2 restart