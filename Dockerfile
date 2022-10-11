FROM php:8.1-fpm-alpine
ARG UID=1000
ARG GID=1000

ENV TZ=UTC
RUN apk add --update bash libpng-dev libxml2-dev zip unzip curl sqlite supervisor npm libzip-dev
RUN npm install -g npm@latest
RUN apk add --no-cache nginx wget
RUN docker-php-ext-install mysqli pdo pdo_mysql zip gd

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/php.ini /usr/local/etc/php/php.ini

RUN mkdir -p /app
COPY . /app
# COPY ./src /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
RUN cd /app && \
    /usr/local/bin/composer install --ignore-platform-reqs --optimize-autoloader --no-dev

RUN cd /app && \
    php artisan route:clear
RUN cd /app && \
    php artisan cache:clear
RUN cd /app && \
    php artisan storage:link
RUN cd /app && \
    /usr/local/bin/npm ci
RUN cd /app && \
    /usr/local/bin/npm run build



RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh


