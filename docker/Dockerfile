FROM php:8.3-apache

# Copy virtual host into container
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Enable rewrite mode
RUN a2enmod rewrite

# Install necessary packages
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libzip-dev \
    wget \
    git \
    unzip

# Install PHP Extensions
RUN docker-php-ext-install zip pdo_mysql

# Install the latest Xdebug compatible with PHP 8.3
RUN pecl install -o -f xdebug-3.3.0 \
    && docker-php-ext-enable xdebug

# Copy composer installable
COPY ./install-composer.sh ./

# Copy php.ini
COPY ./php.ini /usr/local/etc/php/

# Cleanup packages and install composer
RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh ./install-composer.sh \
    && rm ./install-composer.sh

# Change the current working directory
WORKDIR /var/www

# Change the owner of the container document root
RUN chown -R www-data:www-data /var/www

# Start Apache in the foreground
CMD ["apache2-foreground"]
