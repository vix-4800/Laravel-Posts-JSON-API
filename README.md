# LOCAL JSON:API

## Installation

Create `.env` file and configure your environment

### Using docker

#### With Makefile

    make install

#### Without Makefile

-   Install Laravel Dependencies

        docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php81-composer:latest composer install --ignore-platform-reqs --no-progress --no-interaction

### Without docker

-   Install Laravel Dependencies

        composer install --ignore-platform-reqs --no-progress --no-interaction

-   Generate Laravel Application Key

        php artisan key:generate

## After installation

### Run migrations

-   `make migrate` - docker and makefile

-   `./vendor/bin/sail artisan migrate --seed` - docker without makefile

-   `php artisan migrate --seed` - without docker

### Start the application

-   `make start` - docker and makefile

-   `./vendor/bin/sail up -d` - docker without makefile

-   `php artisan serve` - without docker

You can access the application using API at:

<http://localhost:8000/api> (without docker)

or

<http://localhost/api> (docker / sail)
