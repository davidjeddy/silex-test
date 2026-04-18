FROM php:latest

# change working dir
WORKDIR /code

# call PHP images script `docker-php-ext-install` and install language extensions
RUN docker-php-ext-install pdo pdo_mysql

# add vendor/bin to PATH
ENV PATH "$PATH:/code/vendor/bin"

CMD ["tail", "-f", "/dev/null"]