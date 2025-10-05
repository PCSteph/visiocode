FROM php:8.2-cli-alpine

# Installer les dépendances nécessaires
RUN apk add --no-cache \
    curl \
    unzip \
    git \
    bash \
    libzip-dev \
    zip \
    && docker-php-ext-install zip mysqli
    
# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir le dossier de travail
WORKDIR /var/www/html

# Copier les fichiers du projet
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader || true

# Exposer le port 9000
EXPOSE 9000

# Lancer le serveur PHP intégré sur /var/www/html
CMD ["php", "-S", "0.0.0.0:9000", "-t", "/var/www/html"]
