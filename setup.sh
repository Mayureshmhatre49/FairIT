#!/bin/bash
composer install --no-interaction
php artisan key:generate
php artisan migrate --force
