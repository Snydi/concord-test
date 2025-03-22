#!/bin/sh

until mysql -h mysql -u root -p${DB_PASSWORD} -e 'SELECT 1' &> /dev/null; do
  echo "Waiting for MySQL to be ready..."
  sleep 2
done

php artisan migrate
php artisan db:seed
php artisan key:generate

exec php-fpm
