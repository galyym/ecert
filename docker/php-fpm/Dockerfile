FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    apt-utils \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libxml2-dev

# Установка расширений PHP
RUN docker-php-ext-install bcmath \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install exif \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pcntl

COPY ./docker/php-fpm/php.ini /usr/local/etc/php/conf.d/php.ini

COPY . /var/www/ecert

COPY composer.*  ./

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

# alias
RUN echo "alias a='artisan'" >> /root/.bashrc

RUN composer install \
      --no-interaction \
      --no-plugins \
      --no-suggest \
      --no-scripts \
      --no-dev \
      --no-autoloader \
      --prefer-dist


RUN composer dump-autoload  --no-scripts --optimize --no-dev

WORKDIR /var/www/ecert

EXPOSE 9000
CMD ["php-fpm"]
