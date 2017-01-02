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
First copy .env.dist as .env and edit values as needed (defaults are provided)

    cp ./docker/code/.env.dist ./docker/code/.env

Next setup the container environment

    docker-compose up --build

Once the env is setup open a new terminal window and install dependencies

    docker-compose run vendor composer install --profile -o -vvv    
    
Finally, check the IP of the DB container(s). Edit the .env to match

    docker inspect silextest_db_1 | grep IPAddress
    docker inspect silextest_db_test_1 | grep IPAddress

Usage
===
Once the container system is built the application will be accessible via HTTP requests at

    http://localhost:8080/

Testing
===
Bring the environment up via 

    docker-compose up --build

Build and run Codeception testing suites in one step
   
    docker-compose run code codecept build -c ./tests && docker-compose run code codecept run -c ./tests

Observe output

If you make changes to the codeception configuration rebuilding the generated classes is required

    docker-compose run code codecept build -c ./tests