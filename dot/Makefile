##
## -----------------------------
##	Global
## -----------------------------
##

.PHONY: git.setup

git.setup:
	cp .gitalias ~/.gitalias
	git config --global include.path "~/.gitalias"

##
## -----------------------------
##	Misc
## -----------------------------
##

.PHONY: all
all: help

.PHONY: help
help: ## Show this help
help:
	@grep -E '(^[a-zA-Z0-9_\-\.]+:.*?##.*$$)|(^##)' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
