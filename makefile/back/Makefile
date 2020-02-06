
include ${CURDIR}/../common.mk

##
## -----------------------------
##	Application
## -----------------------------
##

.PHONY: build connect start stop logs

build:
	@docker-compose build

connect:
	@docker-compose run --rm ruby bash

start: stop ## Start rails server
	rm -f tmp/pids/server.pid
	docker-compose run --rm ruby bundle install --quiet
	@docker-compose up -d
	@echo "Rails is up and running"
	@docker-compose ps

stop: ## Stop rails server
	@docker-compose down --remove-orphans
	@echo "Rails was stopped"

logs: ## Display logs about the back-end
	@docker-compose logs

##
##-----------------------------
##	Testing
##-----------------------------
##

PHONY:  tests .$(system).tests tests.migrate

.windows.tests: tests.migrate
	@winpty docker-compose exec ruby bundle exec rails test

.mac.tests: tests.migrate
	@docker-compose exec ruby bundle exec rails test

tests: .$(system).tests ## Run all Rails tests

tests.migrate: ## Run all pending migrations for test env
	@docker-compose exec ruby bundle exec rails db:migrate RAILS_ENV=test

##
## -----------------------------
##	Misc
## -----------------------------
##

help: ## Show this help
