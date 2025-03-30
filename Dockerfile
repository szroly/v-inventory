FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    liboing-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

    COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
    COPY . .

    RUN composer install --no-dev --optimize-autoloader
    RUN chown -R www-data:www-data /var/www/html \
        && a2enmod rewrite

    EXPOSE 80

    CMD ["apache2-foreground"]