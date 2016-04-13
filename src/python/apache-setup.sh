#!/usr/bin/env bash
rm /usr/bin/python
ln -s /usr/bin/python3 /usr/bin/python

apt-get update

apt-get -y install apache2

a2dismod mpm_event
a2enmod mpm_prefork cgi

cp 000-default.conf /etc/apache2/sites-available/

ln -s /vagrant/src/python/index.py /var/www/html/index.py

service apache2 reload