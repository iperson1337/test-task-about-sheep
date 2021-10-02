# Test task

## Запуск backend
```
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan short-schedule:run --lifetime=100
```

### Запуск frontend
```
npm i
cp .env.example .env
npm run serve
```
