.DEFAULT_GOAL=help
project-name := Symfony-Bootstrap

.PHONY: install

install: composer.lock.installed ## Install project
	./bin/console doctrine:migration:migrate

composer.lock.installed: composer.lock
	composer install
	touch composer.lock.installed

lint: composer.lock.installed ## Run code lint check
	composer validate
	vendor/bin/php-cs-fixer fix --diff --dry-run --using-cache no --ansi
	vendor/bin/phpstan analyze -l7 --no-progress  ./src --ansi

test: composer.lock.installed ## Run test suite
	APP_ENV=test ./bin/console doctrine:database:create --if-not-exists
	APP_ENV=test ./bin/console doctrine:migrations:up-to-date || APP_ENV=test ./bin/console doctrine:migrations:migrate -n -q
	./bin/phpunit --coverage-html ./build/coverage  --coverage-clover ./build/clover.xml || true
	vendor/bin/coverage-check build/clover.xml 100

clean:  ## Reset project to initial state
	@rm -rf vendor build composer.lock.installed

help:
	@echo -e '\033[0;33m=================================\033[0m'
	@echo -e '\033[0;33m$(project-name)\033[0m'
	@echo -e '\033[0;33m=================================\033[0m'
	@echo
	@echo -e '\033[0;33mUsage: \033[0m'
	@echo '  make [target]'
	@echo
	@echo -e '\033[0;33mTargets: \033[0m'
	@grep  -hE '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-10s\033[0m %s\n", $$1, $$2}'