[!WARNING]
**⚠️ This project has been archived and is no longer maintained. ⚠️**

Github has shown it does not respect its users. Other have said it better than I can.

- https://www.theregister.com/2022/06/30/software_freedom_conservancy_quits_github/
- https://www.andrlik.org/dispatches/migrating-from-github-motivation/
- https://techresolve.blog/2025/12/27/looking-to-migrate-company-off-github-whats-the/
- https://lord.io/leaving-github/
- https://dev.to/alanwest/how-to-actually-migrate-from-github-to-codeberg-without-losing-your-mind-33bf>
> Development has moved to Codeberg:
> **➡️ https://codeberg.org/DavidJEddy/silex-test**
>
> Please update your remotes:
> ```bash
> git remote set-url origin https://codeberg.org/DavidJEddy/silex-test
> ```

---
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

Build the Codeception test suite (needed once per container build or if conguration is changed)

    docker-compose run code codecept build -c ./tests

Build and run Codeception testing suites in one step
   
    docker-compose run code codecept run -c ./tests

Observe output

If you make changes to the codeception configuration rebuilding the generated classes is required

    docker-compose run code codecept build -c ./tests