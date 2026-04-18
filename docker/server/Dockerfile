FROM php:latest

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /code/web

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80"]