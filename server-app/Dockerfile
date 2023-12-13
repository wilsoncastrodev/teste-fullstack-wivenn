FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libpq-dev \
    supervisor

RUN echo '[program:laravel-worker] \n\
nodaemon=true \n\
process_name=%(program_name)s \n\
command=php /var/www/app/artisan queue:work --queue=default --sleep=3 --tries=3 \n\
autostart=true \n\
autorestart=true \n\
user=root \n\
redirect_stderr=true \n\
stdout_logfile=/var/www/app/storage/logs/worker.log \n\
stopwaitsecs=3600' >> /etc/supervisor/conf.d/laravel-worker.conf

RUN docker-php-ext-install pdo
RUN docker-php-ext-enable pdo

RUN docker-php-ext-install pgsql
RUN docker-php-ext-enable pgsql

RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-enable pdo_pgsql

RUN docker-php-ext-install gd
RUN docker-php-ext-enable gd

RUN docker-php-ext-install sockets
RUN docker-php-ext-enable sockets

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

COPY ./server-init.sh .

RUN chmod -R 775 server-init.sh
