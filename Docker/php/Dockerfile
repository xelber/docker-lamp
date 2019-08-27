FROM php:7.3-fpm
RUN apt-get update && apt-get install -y \
        vim \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libmcrypt-dev \
        libzip-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
RUN pecl install mongodb \
    &&  echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongo.ini

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install calendar
RUN docker-php-ext-install zip

RUN pecl install mcrypt-1.0.2
RUN docker-php-ext-enable mcrypt

COPY php.ini /usr/local/etc/php/conf.d/php.ini