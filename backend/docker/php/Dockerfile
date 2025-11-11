FROM php:8.2-fpm
RUN apt-get update && apt-get install -y \
    git unzip tzdata \
    libzip-dev libicu-dev \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install -j$(nproc) pdo_mysql intl zip gd bcmath opcache \
 && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV TZ=Asia/Tokyo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
WORKDIR /var/www/html
RUN set -eux; { \
  echo 'display_errors=On'; \
  echo 'error_reporting=E_ALL'; \
  echo 'memory_limit=512M'; \
  echo 'upload_max_filesize=32M'; \
  echo 'post_max_size=32M'; \
  echo 'date.timezone="Asia/Tokyo"'; \
  echo 'opcache.enable=1'; \
  echo 'opcache.validate_timestamps=1'; \
  echo 'opcache.revalidate_freq=0'; \
} > /usr/local/etc/php/conf.d/zz-dev.ini
