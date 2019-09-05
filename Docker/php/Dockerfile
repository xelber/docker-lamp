ARG PHP_VERSION=7.2

FROM php:$PHP_VERSION-fpm

ARG WITH_XDEBUG=0
ENV WITH_XDEBUG $WITH_XDEBUG

ARG GIT_USER
ENV GIT_USER $GIT_USER

ARG GIT_EMAIL
ENV GIT_EMAIL $GIT_EMAIL

RUN apt-get update && apt-get install -y \
        vim \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libmcrypt-dev \
        libzip-dev \
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

RUN curl https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN if [ "$WITH_XDEBUG" = "1" ] ; then pecl install xdebug; docker-php-ext-enable xdebug; else echo "No XDEBUG $WITH_XDEBUG"; fi
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

RUN git config --global user.email "$GIT_EMAIL"
RUN git config --global user.name "$GIT_USER"

