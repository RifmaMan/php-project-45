# Makefile
install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-calc:
	./bin/brain-calc

brain-even:
	./bin/brain-even

brain-games:
	./bin/brain-games

brain-gcd:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression
