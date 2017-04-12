#!/bin/bash

if [ "$EUID" -ne 0 ]; then
  echo "Please run this script on behalf of root user"
  exit 1
fi

#== Provision script ==
nginx -v

echo "--==[ configuring nginx... ]==--"
cat >/etc/nginx/sites-available/default <<EOL
server {
    charset utf-8;
    client_max_body_size 128M;

    listen 80; ## listen for ipv4

    server_name yii2.dev;
    root        /var/www/yii2.dev/web;
    index       index.php;

#    location / {
#        # Redirect everything that isn't a real file to index.php
#        try_files $uri $uri/ /index.php$is_args$args;
#    }

    # deny accessing php files for the /assets directory
    location ~ ^/assets/.*\.php$ {
        deny all;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
    }

    location ~* /\. {
        deny all;
    }
}
EOL

echo "--==[ restart nginx... ]==--"
service nginx restart


echo "--==[ reset mysql root password... ]==--"

user=debian-sys-maint
password=p1qjfl1QrpjrvByL
mysql --user="$user" --password="$password" --execute="
    use mysql;
    update user set authentication_string =PASSWORD('') where User='root';
    flush privileges;
    create database yii2basic;
    quit
"

echo "--==[ mysql import data... ]==--"
mysql -uroot yii2basic < /var/www/yii2.dev/backup/category_products.sql
mysql -uroot yii2basic < /var/www/yii2.dev/backup/orders.sql
mysql -uroot yii2basic < /var/www/yii2.dev/backup/user.sql


echo "--==[ config xdebug... ]==--"

echo 'xdebug.remote_port=9000'      >> /etc/php/7.0/mods-available/xdebug.ini
echo 'xdebug.remote_connect_back=1' >> /etc/php/7.0/mods-available/xdebug.ini
echo 'xdebug.remote_enable=1'       >> /etc/php/7.0/mods-available/xdebug.ini
echo 'xdebug.idekey=PHPSTORM'       >> /etc/php/7.0/mods-available/xdebug.ini
echo 'xdebug.scream=0'              >> /etc/php/7.0/mods-available/xdebug.ini
echo 'xdebug.show_local_vars=1'     >> /etc/php/7.0/mods-available/xdebug.ini

echo "--==[ restart php-fpm... ]==--"
sudo service php7.0-fpm restart
