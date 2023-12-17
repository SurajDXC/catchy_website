# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/html/

# Install dependencies
RUN apt-get update && \
    apt-get install -y git && \
    apt-get install -y libzip-dev && \
    docker-php-ext-install zip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 


RUN composer install --no-scripts --no-interaction --ignore-platform-req=ext-exif

# Copy the rest of the application code
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# Apache configuration
RUN a2enmod rewrite

# Expose port 80 and start Apache
EXPOSE 80
CMD ["apache2-foreground"]
