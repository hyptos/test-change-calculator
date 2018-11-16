test: phpcs phpstan phpunit behat

phpcs:
	vendor/bin/php-cs-fixer fix --dry-run --allow-risky=yes src/

phpstan:
	vendor/bin/phpstan analyse --level=7 src/

phpunit:
	vendor/bin/phpunit

behat:
	vendor/bin/behat

fix:
	vendor/bin/php-cs-fixer fix --verbose --allow-risky=yes src/
