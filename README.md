# check-test3_Pigly

環境構築

Dockerビルド

git httpを入力
DockerDesktopアプリを立ち上げる
docker-compose up -d --build

Laravel環境構築

docker-compose exec php bash
composer install
.envに以下の環境変数を追加
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass



使用技術(実行環境)

PHP
Laravel
MySQL
