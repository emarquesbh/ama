FROM php:8.1-fpm

      # Diretório de trabalho dentro do container
      WORKDIR /var/www

      # Instala dependências necessárias
      RUN apt-get update && apt-get install -y \
             libpng-dev \
             libonig-dev \
             libxml2-dev \
             zip \
             unzip

      # Instala extensões PHP necessárias
      RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath

      # Copia os arquivos do projeto para o container
      COPY . /var/www

      # Instala o Composer globalmente
      COPY --from=composer:latest /usr/bin/composer /usr/bin/composer