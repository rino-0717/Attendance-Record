# アプリケーション名
Attendance-Records
概要説明：勤怠管理システム
![打刻画面](User/rino/Desktop/打刻画面png "打刻画面")

## 作成した目的
人事評価のため

## アプリケーションURL
会員登録：http://localhost:90/register
ログイン：http://localhost:90/login
打刻画面：http://localhost:90/
打刻一覧：http://localhost:90/attendance

## 他のリポジトリ

## 機能一覧
会員登録機能、ログイン機能、打刻機能、打刻管理機能

## 使用技術（実行環境）
・PHP 8.3.2
・Laravel 8.83.27

## テーブル設計図
![テーブル仕様書](User/rino/Desktop/テーブル仕様書png "テーブル仕様書")

## ER図
![ER図](User/rino/Desktop/ER図png "ER図")

# 環境構築
・Dockerビルド
1.git clone git@github.com:
2.DockerDesktopアプリを立ち上げる
3.docker-compose up -d --build

・Laravel環境構築
1.docker-compose exec php bash
2.composer install
3.「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
4..envに以下の環境変数を追加
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=laravel_user
    DB_PASSWORD=laravel_pass
5.アプリケーションキーの作成：php artisan key:generate
6.マイグレーションの実行：php artisan migrate
7.シーディングの実行：php artisan db:seed

・アカウントの種類（テストユーザー）
ユーザー名：test1
メールアドレス：test1@test
パスワード：test1@test