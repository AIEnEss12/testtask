# testtask
Тестовое задание

Запуск проекта в docker compose
docker compose up -d

Вход в контейнер php
docker compose exec php-8.0 sh

cd task3

composer install

Запуск миграций 
php bin/console doctrine:migrations:execute --up 'DoctrineMigrations\Version20231216122127'

php bin/console doctrine:migrations:execute --down 'DoctrineMigrations\Version20231216122127'

php bin/console doctrine:migrations:execute --up 'DoctrineMigrations\Version20231216140226'

php bin/console doctrine:migrations:execute --down 'DoctrineMigrations\Version20231216140226'

Запуск фикстур для заполнения данных
php bin/console doctrine:fixtures:load -v

http://localhost/orders - результат
