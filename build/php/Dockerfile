#ini and set default value
ARG PHP_VERSION=8.2-fpm
FROM php:"${PHP_VERSION}"

COPY --from=resource_code / /var/www/html
WORKDIR /var/www/html

#INSTALL STEP
RUN apt-get update && apt-get install -y --fix-missing \
libonig-dev \
libzip-dev \
libpng-dev \
libjpeg62-turbo-dev \
libfreetype6-dev \
zip 

RUN apt-get update && apt-get install -y --fix-missing npm 
RUN npm install

RUN apt-get update && apt-get install -y --fix-missing \
libpq-dev \
libicu-dev

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-install pdo pdo_pgsql intl

#XDEBUG 
RUN pecl install xdebug && docker-php-ext-enable xdebug

#CONFIGURE STEP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install -j$(nproc) gd


#INSTALL COMPOSER STEP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN apt-get autoremove

#SET GROUP groupadd/groupmod
RUN groupadd -g 1000 www-data
#SET USER useradd/usermod
RUN usermod -u 1000 -g www-data www-data
RUN chown www-data:www-data -R /var/www

USER www-data
#COMMAND
ENTRYPOINT ["php-fpm"]
