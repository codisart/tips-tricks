provider=$(shell)

.PHONY: install transpiloop

DOCKER_COMMAND=docker run --rm -v ${PWD}:/var/www/html -w /var/www/html
NODE_VERSION=12

package.json:
	${DOCKER_COMMAND} node:${NODE_VERSION} npm init -y
	${DOCKER_COMMAND} node:${NODE_VERSION} npm install babel-cli@6 babel-preset-react-app@3

install: package.json
	${DOCKER_COMMAND} node:${NODE_VERSION} npm install
	@echo "project is installed"

npm-install:
	${DOCKER_COMMAND} node:${NODE_VERSION} npm install axios

transpiloop:
	${DOCKER_COMMAND} node:${NODE_VERSION} npx babel --watch src --out-dir . --presets react-app/prod
