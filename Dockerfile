FROM php:8.1-fpm
RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get install unzip -y

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Infection instalation
RUN apt-get update && apt-get upgrade -y
RUN apt-get install wget -y
RUN apt-get -y install gpg
RUN wget https://github.com/infection/infection/releases/download/0.27.0/infection.phar
RUN wget https://github.com/infection/infection/releases/download/0.27.0/infection.phar.asc

RUN chmod +x infection.phar
RUN gpg --recv-keys C6D76C329EBADE2FB9C458CFC5095986493B4AA0
RUN gpg --with-fingerprint --verify infection.phar.asc infection.phar

RUN mv infection.phar /usr/local/bin/infection
# End Infection instalation

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
