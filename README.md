Silex Test
===
A test application leveraging the Silex micro framework, codeception functional automated testing,
and docker containerization.

Contrib
===
David J Eddy <me@davidjeddy.com>

Lic
===
https://opensource.org/licenses/MIT 

Requirements
===
    Basic linux terminal skills
    [Terminal](https://www.digitalocean.com/community/tutorials/an-introduction-to-the-linux-terminal)
    [Docker](https://www.docker.com/)

Installation
===
First copy .env.dist as .env and edit values as needed (defaults are provided).

    cp .env.dist .env && vim .env

Next setup the container environment

    docker-compose up --build

Once the env is setup open a new terminal window and install dependencies

    docker-compose run vendor composer install --profile -o -vvv
    
Finally, double check the IP of the DB container. if not default update in .env

    docker inspect silextest_db_1 | grep IPAddress

Usage
===
Once the container system is built the application will be accessible via HTTP requests at

    http://localhost:8080/