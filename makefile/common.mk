## How to know which OS are you on
ifeq ($(OS),Windows_NT)
	system := windows
else
	system := mac
endif

## Documentation of the make targets
.PHONY: all
all: help

.PHONY: help
help:
	@grep -E '(^[a-zA-Z0-9_\-\.]+:.*?##.*$$)|(^##)' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'


