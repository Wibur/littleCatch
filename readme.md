LaravelPrac
## 基本安裝
>composer install
>cp .env.example .env

## 資料庫遷移
>php artisan migrate

## 進到dockerfiles資料夾
>cd dockerfiles

## 啟動docker
>docker-compose up -d

## 進入容器內
>docker-compose exec app bash
>php artisan schedule:run
