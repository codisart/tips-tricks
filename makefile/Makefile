
include ${CURDIR}/common.mk

##
## -----------------------------
##	Global
## -----------------------------
##

.PHONY: start stop

start: back.start front.start ## Start all applications

stop: back.stop ## Stop all applications

##
## -----------------------------
##	Front-end
## -----------------------------
##

.PHONY: front front.start front.tests

make.front := $(MAKE) --no-print-directory --directory=front

front:
	@$(make.front)

front.start: ## Start react application
	@$(make.front) start

front.tests: ## Run front tests
    @$(make.front) tests

##
## -----------------------------
##	Back-end
## -----------------------------
##

.PHONY: back back.start back.stop back.tests

make.back := $(MAKE) --no-print-directory --directory=back

back:
	@$(make.back)

back.start: ## Start rails server
	@$(make.back) start

back.tests: ## Run back tests
    @$(make.back) tests

##
## -----------------------------
##	Misc
## -----------------------------
##

help: ## Show this help
