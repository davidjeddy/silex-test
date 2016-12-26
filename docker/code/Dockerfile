FROM php:7

# change working dir
WORKDIR /code

# install curl and php
RUN apt-get update -y
RUN apt-get install git zip -y

# install composer & app deps; then remove
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

CMD ["tail", "-f", "/dev/null"]