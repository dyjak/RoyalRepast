#!/bin/bash

mysql -uroot -e "CREATE DATABASE IF NOT EXISTS royal_repast;"

if [ $? -ne 0 ]; then
  echo "Nie udalo sie utworzyc bazy danych."
  exit 1
fi

php -r "copy('.env.example', '.env');"

composer install

./DBrefresh.sh

php artisan key:generate

php artisan storage:link

php artisan serve &

code .
