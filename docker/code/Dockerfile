FROM php:latest

# install curl and php
RUN apt-get update -y
RUN apt-get install curl git zip -y

# call PHP images script `docker-php-ext-install` and install language extensions
RUN docker-php-ext-install pdo pdo_mysql

# install composer & app deps; then remove
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# change working dir
WORKDIR /code

CMD ["tail", "-f", "/dev/null"]