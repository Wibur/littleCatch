LaravelPrac
## 基本安裝
>composer install

## 環境檔
>cp .env.example .env

## docker 環境檔
>cp .env.database ./dockerfiles/.env

## 進到dockerfiles資料夾
>cd dockerfiles

## 啟動docker
>docker-compose up -d

## 資料庫遷移
>php artisan migrate

## 進入容器內
>docker-compose exec app bash
