FROM php:5.5-apache

RUN apt-get update && apt-get -y upgrade
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install \
    unzip libfreetype6-dev libjpeg62-turbo-dev libmcrypt-dev libpng12-dev

ADD https://github.com/kalcaddle/KODExplorer/archive/master.zip /file.zip
RUN unzip /file.zip -d /var/www/html && \
    mv /var/www/html/KODExplorer-master /var/www/html/file  && \
    chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite && \
    docker-php-ext-install iconv mcrypt && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install gd

RUN docker-php-ext-install mbstring pdo_mysql mysqli

RUN usermod -u 1000 www-data
RUN usermod -G staff www-data
