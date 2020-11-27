<h1 align="center">Discount Microservice</h1>

### install:
```
add discount.io in /etc/hosts
```
```
docker exec -it discount_microservice bash
```
```
composer install
```

```
mv .env.example .env
```

```
php artisan migrate
```

```
php artisan queues:work --name=ROLLBACK_WALLET_INCREASE
```