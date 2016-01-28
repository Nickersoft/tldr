.PHONY: semantic

all:
	make setup
	make migrate
	make serve

dependencies:
	npm install
	composer install

folders:
	mkdir -p storage/logs
	mkdir -p public/js
	mkdir -p public/css
	mkdir -p public/images

files:
	touch storage/database.sqlite
	touch storage/logs/laravel.log

migrate:
	php artisan migrate

permissions:
	chmod -R 777 storage
	chmod -R 777 public/js
	chmod -R 777 public/css
	chmod -R 777 public/images

semantic:
	cd semantic && gulp clean && gulp build
	cp -af semantic/dist/themes/default/assets/fonts/. public/fonts
	cp -af semantic/dist/themes/default/assets/images/. public/images/

serve:
	php artisan serve

setup: dependencies files semantic static

images:
	cp -af resources/assets/images/. public/images/

js:
	cp -f node_modules/requirejs/require.js public/js/
	node_modules/.bin/r.js -o build.js

css:
	gulp --production

clean:
	rm -rf public/images
	rm -rf public/css
	rm -rf public/js

static: clean folders permissions images css js
