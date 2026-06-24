FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Create .env from .env.example
RUN cp .env.example .env && \
    php artisan key:generate

# Create necessary directories
RUN mkdir -p storage/logs storage/framework/sessions storage/framework/views storage/framework/cache

# Set permissions
RUN chown -R www-data:www-data /app

# Expose port
EXPOSE 8000

# Start PHP-FPM and serve with built-in server
CMD php artisan serve --host=0.0.0.0 --port=8000

