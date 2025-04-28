touch /var/www/storage/logs/laravel-$(date +%F).log
php artisan migrate
touch /var/www/storage/logs/laravel-$(date +%F).log
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache
exit
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache
exit
