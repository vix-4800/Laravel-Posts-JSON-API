install:
	docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php81-composer:latest composer install --ignore-platform-reqs --no-progress --no-interaction
	./vendor/bin/sail up -d
	./vendor/bin/sail artisan key:generate
	./vendor/bin/sail down

migrate:
	./vendor/bin/sail up -d
	./vendor/bin/sail artisan migrate --seed
	./vendor/bin/sail down

start:
	./vendor/bin/sail up -d

stop:
	./vendor/bin/sail down

pint:
	./vendor/bin/pint

docs:
	./vendor/bin/sail artisan ide-helper:generate
	./vendor/bin/sail artisan ide-helper:models
	./vendor/bin/pint
