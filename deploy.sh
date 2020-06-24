#!/usr/bin/env bash

#composer selfupdate

php artisan clear-compiled
composer dump-autoload

#composer install

php artisan config:clear
php artisan cache:clear

#php artisan migrate:reset
#php artisan migrate
#php artisan db:seed

#rm -rf node_modules
#npm cache clean
#npm install
#npm run production