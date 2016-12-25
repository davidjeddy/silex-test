# Silex Test
===
A test application leveraging the Silex micro framework, codeception functional automated testing,
docker containerization, and the AWS container deployment process.

# Contrib
===
David J Eddy <me@davidjeddy.com>

# Lic
===
https://opensource.org/licenses/MIT

# Usage
===
    docker build -t silex-test . # this can take some time, be patient
    docker run -d -p 8080:80 silex-test # host port: container port
    http://localhost:8080/ # HTTP request address 