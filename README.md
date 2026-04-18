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
docker containerization, and the AWS container deployment process.

Contrib
===
David J Eddy <me@davidjeddy.com>

Lic
===
https://opensource.org/licenses/MIT 

Requirements
===
    AWS
    Docker
    Terminal

Installation
===
    docker-compose build
    docker-compose up
    docker-compose run code composer install --profile -o -vvv
    
Usage
===
    http://localhost:8080/ # HTTP request address