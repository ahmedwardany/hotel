# Use the official PHP image as base
FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Expose port 80
EXPOSE 80

# Run command when the container starts
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
