# Use PHP 7.3 base image
FROM php:7.3-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache modules
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the CodeIgniter application files to the container
COPY . /var/www/html/

# Set permissions for CodeIgniter directories if necessary
RUN chown -R www-data:www-data /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache service
CMD ["apache2-foreground"]
