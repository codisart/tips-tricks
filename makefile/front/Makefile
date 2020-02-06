
include ${CURDIR}/../common.mk

.PHONY: start tests tests.*

##
##-----------------------------
##	Application
##-----------------------------
##

start: ## Start react application
	@yarn start

##
##-----------------------------
##	Testing
##-----------------------------
##

tests.unit: ## Run unit react tests
	@yarn test

tests.cypress: ## Run cypress react tests
	@yarn test:e2e

tests.cypress.light: ## Run cypress react tests without video recording
	@yarn test:e2e:light

tests: tests.unit tests.cypress ## Run all react tests

##
## -----------------------------
##	Misc
## -----------------------------
##

help: ## Show this help
