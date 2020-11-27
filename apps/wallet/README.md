<h1 align="center">Wallet Microservice</h1>

### install:
```
add wallet.io in /etc/hosts
```
```
docker exec -it wallet_microservice bash
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
php artisan queues:work --name=WALLET_INCREASE
```