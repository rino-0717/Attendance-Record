# アプリケーション名
Attendance-Records
- 概要説明：勤怠管理システム
![打刻画面](https://github.com/rino-0717/Attendance-Record/assets/157961363/64b513da-c0e6-4a5b-aa78-21eaee464384)

## 作成した目的
人事評価のため

## アプリケーションURL
- 会員登録：http://localhost:90/register
- ログイン：http://localhost:90/login
- 打刻画面：http://localhost:90/
- 打刻一覧：http://localhost:90/attendance

## 他のリポジトリ

## 機能一覧
会員登録機能、ログイン機能、打刻機能、打刻管理機能

## 使用技術（実行環境）
- PHP 7.4.9
- Laravel 8.83.27
- Mysql 8.0.26

## テーブル設計図
![テーブル仕様書](https://github.com/rino-0717/Attendance-Record/assets/157961363/309410e4-bf87-4e3c-9245-54e3fffc44fe)

## ER図
![ER図](https://github.com/rino-0717/Attendance-Record/assets/157961363/da799f1d-313b-4c77-89c9-1eb551435a67)

# 環境構築
Dockerビルド
- 1.git clone git@github.com:rino-0717/Attendance-Record.git
- 2.DockerDesktopアプリを立ち上げる
- 3.docker-compose up -d --build

Laravel環境構築
- 1.docker-compose exec php bash
- 2.composer install
- 3.「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
- 4..envに以下の環境変数を追加
    - DB_CONNECTION=mysql
    - DB_HOST=mysql
    - DB_PORT=3306
    - DB_DATABASE=laravel_db
    - DB_USERNAME=laravel_user
    - DB_PASSWORD=laravel_pass
- 5.アプリケーションキーの作成：php artisan key:generate
- 6.マイグレーションの実行：php artisan migrate

アカウントの種類（テストユーザー）
- ユーザー名：test,test2,test3,test4,test5,test6,test7,test8
- メールアドレス：test@test,test2@test,test3@test,test4@test,test5@test,test6@test,test7@test,test8@test
- パスワード：test@test,test2@test,test3@test,test4@test,test5@test,test6@test,test7@test,test7@test
