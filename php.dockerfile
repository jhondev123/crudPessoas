FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . .

EXPOSE 9000

CMD ["php-fpm"]
