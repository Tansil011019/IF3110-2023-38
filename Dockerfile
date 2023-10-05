# Use the php:8.0-apache image as the base image
FROM php:8.0-apache

# Install the PostgreSQL PDO extension
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo_pgsql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the 'public' directory containing your application files
COPY ./index.php .
COPY ./public/.htaccess ./public/
COPY ./app/.htaccess ./app/
COPY ./.htaccess .

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
