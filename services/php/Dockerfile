FROM php:8.1-fpm

#Add user www-data (nginx) into docker
RUN usermod -u 1000 www-data

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip \
    nano \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install opcache

COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]