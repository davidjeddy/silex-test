FROM php:7

# install curl and php
RUN apt-get update -y
RUN apt-get install git zip -y

# change to web root
WORKDIR /var/www/html

#Copy app dep list
COPY composer.json /var/www/html

# install composer & app deps; then remove
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --ansi --profile -o -vvv
RUN rm composer.phar

# run PHP server
CMD ["php", "-S", "0.0.0.0:80"]