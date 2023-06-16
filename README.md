# Mutation Tests Presentation

### Requirements

- Docker: version 20.10.21
- Docker Compose: version 1.29.2

### Building the project for the first time

- docker-compose up -d --build

### Helpful tips

 - **Executing code coverage inside container**: XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html /var/www/html/tmp/coverage/ --coverage-text --coverage-filter src
 - **Executing infection**: 
   - Need to be inside the folder /var/www/html on the container
   - Just run: infection. See the following [link](https://infection.github.io/guide/command-line-options.html) for more options on the command line execution
