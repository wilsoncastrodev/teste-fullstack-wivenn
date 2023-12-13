#!/bin/bash -it

cp .env.example .env
composer install --ignore-platform-req=ext-sockets
php artisan route:clear
php artisan cache:clear
php artisan config:clear
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan passport:install --force
rm -rf public/storage
php artisan storage:link
chmod -R 777 storage
service supervisor start laravel-worker
