# Use the php:8.0-apache image as the base image
FROM php:8.0-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the 'public' directory containing your application files
COPY ./public/index.php ./public/
COPY ./public/.htaccess ./public/

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
