up:
	docker compose up -d

down:
	docker compose down

build:
	docker compose build

logs:
	docker compose logs -f

artisan:
	docker compose exec app php artisan

composer:
	docker compose exec app composer

bash:
	docker compose exec app bash

mysql:
	docker compose exec mysql mysql -ularavel -plaravel discord_clone