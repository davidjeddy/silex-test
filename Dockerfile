FROM php:7

# install curl and php
RUN apt-get update -y
RUN apt-get install git zip -y

# change to web root
WORKDIR /var/www/html

# install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer

# install proj depscd /var/www
COPY ./composer.json /var/www/html
RUN composer install --ansi --profile -o -vvv

# add application source file
ADD index.php /var/www/html

# run PHP server
CMD ["php", "-S", "0.0.0.0:80"]