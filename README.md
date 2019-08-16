# 都内の天気情報を表示する

## Getting Started / スタートガイド
本環境はDockerで構築しています。

## Prerequisites / 必要条件
- PHP7.3
- MySQL8.0 
- nginx 
- composer 
- Vue
- node
- Docker

## Installing / インストール

### Git clone 
まずはクローン
```
$ git clone https://github.com/KitamuraTakashi/weather.git
```

### Docker compose build & up
Dockerファイルの構築後に立ち上げる
```
$ cd weather/
$ docker-compose up -d --build
```

これでローカルにアクセスできるはず。

http://127.0.0.1:10080

### Running Migrations
マイグレーションを実行
```
$ docker-compose exec app php artisan migrate
```

## As necessary

### Composer dump autoload

```
$ docker-compose exec app composer dump-autoload
```

### MySQL connection

```
$ docker-compose exec db bash -c 'mysql -uroot -p${MYSQL_PASSWORD} ${MYSQL_DATABASE}'
```

