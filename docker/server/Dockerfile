FROM php:latest

WORKDIR /code

# req. when using php built in server
RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "index.php"]