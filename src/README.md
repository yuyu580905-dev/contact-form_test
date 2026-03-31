# contact-form_test

## 環境構築

Dockerビルド

1. git clone git@github.com:yuyu580905-dev/contact-form_test.git
2. cd contact-form_test
3. docker-compose up -d --build

Laravel環境構築

1. docker-compose exec php bash
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed


## 使用技術（実行環境）

・PHP 8.1
・Laravel 8.75
・MySQL 8.0
・nginx 1.21.1
・Docker 29.1.3


## ER図

![ER図](./er-diagram.png)


## 開発環境URL

・お問い合わせ画面：http://localhost/
・管理画面：http://localhost/admin
・ユーザー登録：http://localhost/register
・phpMyAdmin：http://localhost:8080/


### 管理画面ログインについて

管理画面を利用するにはユーザー登録が必要です。
上記URLからユーザー登録後ログインしてください。