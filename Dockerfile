
FROM php:8.3-apache


RUN apt-get update && apt-get install -y \
    git unzip zip pkg-config \
    libpq-dev libzip-dev libonig-dev \
    libicu-dev libxml2-dev \
    && docker-php-ext-install \
    pdo_pgsql mbstring bcmath intl zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && sed -i 's/:80/:10000/' /etc/apache2/sites-available/000-default.conf

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' \
    /etc/apache2/sites-available/000-default.conf \
    && printf '<Directory /var/www/html/public>\nAllowOverride All\nRequire all granted\n</Directory>\n' \
    >> /etc/apache2/apache2.conf

RUN chown -R www-data:www-data storage bootstrap/cache

ENV PORT=10000

EXPOSE 10000

CMD ["sh", "-c", "php artisan migrate --force && apache2-foreground"]
