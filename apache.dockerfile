# Add PHP-Apache base image
FROM php:8.4-apache-bullseye

# Extensions
# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable mysqli extension
RUN docker-php-ext-enable mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install git
# RUN apt-get update
# RUN apt-get install git -y
# RUN rm -rf /var/lib/apt/lists/*