# slim_default
## slim 3 + eloquent + Aura.di

	composer install

make dir cache & log

	mkdir -p cache/twig
	mkdir -p logs/debug

set environment files and edit

	cp sample_phinx.yml phinx.yml
	cp sample.env .env

sample DB Migration

	vendor/bin/phinx migrate -e development