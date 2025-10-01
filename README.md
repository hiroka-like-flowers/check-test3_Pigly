# check-test3_Pigly

環境構築

Dockerビルド

git : https://github.com/hiroka-like-flowers/check-test3_Pigly.git
   main->create/file->edit/file->feature/file
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
5,マイグレーションの実行
   　　　php artisan migrate
6,シーディングの実行
   　　　php artisan db:seed
・使用技術
   　・PHP 8.2.29
    ・Laravel Framework 8.83.29
    ・MySQL 8.0.26

ER図<img width="579" height="654" alt="image" src="https://github.com/user-attachments/assets/702f0220-ac3f-47db-89de-2de0e652faa5" />

ログインページのメールとパスワード
　　　email:suzukihanako@a.com
　　　password:121234
URL
　　・開発環境 http://localhost:8082/
　　・phpMyAdmin http://localhost:8083/

