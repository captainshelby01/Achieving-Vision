#!/bin/sh
set -e

echo "Starting Achieving Vision platform on Render..."

# Create storage directories if they do not exist
mkdir -p /var/www/html/storage/framework/cache/data
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/bootstrap/cache

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Run storage link
php artisan storage:link || true

# Run database migrations and seeding if DB is reachable
if [ -n "$DB_HOST" ] || [ -n "$DATABASE_URL" ]; then
    echo "Running database migrations and initial seeders..."
    php artisan migrate --force --seed || php artisan migrate --force || echo "Database migration step completed."
    echo "Ensuring Admin credentials..."
    php artisan app:ensure-admin || true
fi

# Cache configuration, routes, and views for optimal performance
echo "Caching Laravel configuration & routes..."
php artisan filament:assets || true
php artisan livewire:publish --assets || true
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Start PHP-FPM in background
echo "Starting PHP-FPM..."
php-fpm -D

# Start Nginx in foreground
echo "Starting Nginx..."
nginx -g "daemon off;"