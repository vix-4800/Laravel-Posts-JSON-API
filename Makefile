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
