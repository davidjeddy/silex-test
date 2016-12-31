FROM php:latest

# change working dir
WORKDIR /code

# call PHP images script `docker-php-ext-install` and install language extensions
RUN docker-php-ext-install pdo pdo_mysql

# add vendor/bin to PATH
# if .env says env!=PRD update PATH
ENV PATH "$PATH:/code/vendor/bin"
# if .env says env==PRD delete test dir
#RUN if grep -q "grunt" package.json; then echo succeed; fi

CMD ["tail", "-f", "/dev/null"]