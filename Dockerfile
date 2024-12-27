FROM php:8.2-fpm

# 必要なPHP拡張をインストール
RUN apt-get update && apt-get install -y \
    zip unzip curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composerのインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリの設定
WORKDIR /var/www/html

# 権限を設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
