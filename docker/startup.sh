#!/bin/sh

sed -i "s,LISTEN_PORT,$PORT,g" /etc/nginx/nginx.conf

php-fpm -D

#cd /app
#npm run production

# while ! nc -w 1 -z 127.0.0.1 9000; do sleep 0.1; done;

nginx

