DIR_PATH := $(dir $(realpath $(lastword $(MAKEFILE_LIST))))

build:
	docker build . -t perf2k2-dotenv

deps:
	docker run -itv ${DIR_PATH}:/app perf2k2-dotenv composer install --no-progress --optimize-autoloader

testing:
	docker run -itv ${DIR_PATH}:/app perf2k2-dotenv vendor/bin/phpunit tests