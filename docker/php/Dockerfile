FROM php:7

# install curl and php
RUN apt-get update -y

# run PHP server
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]