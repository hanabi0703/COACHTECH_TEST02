## アプリケーション名
mogitate

## 環境構築
Docker ビルド 
    1.https://github.com/hanabi0703/COATCHTECH_TEST.git
    developブランチを参照

    2.docker compose up -d -build

Laravel 環境構築
    1.docker compose exec php bash
    2.composer install 3. .env.example ファイルから.env を作成し、環境変数を変更
    4.php artisan key:generate
    5.php artisan migrate
    6.php artisan db:seed

## 使用技術（実行環境）

・PHP 7.4.9
・Laravel 8.83.27
・MySQL 8.0.26

## ER 図

なし

## URL

・開発環境：http://localhost/
・phpMyAdmin：http://localhost:8080/
