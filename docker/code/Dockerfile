FROM php:latest

# change working dir
WORKDIR /code

# call PHP images script `docker-php-ext-install` and install language extensions
RUN docker-php-ext-install pdo pdo_mysql

CMD ["tail", "-f", "/dev/null"]