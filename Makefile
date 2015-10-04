init:
	composer update
	
test:
	./vendor/bin/phpspec run ./spec/
