#!/usr/bin/env bash
apt-get update

apt-get -y install apache2 libapache2-mod-python

cp 000-default.conf /etc/apache2/sites-available/

ln -s /vagrant/src/python/index.py /var/www/html/index.py

service apache2 reload