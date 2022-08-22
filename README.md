## CQRS with Symfony Messenger

### Requirements

- Docker compose

### Setup

Initialize containers

```bash
$ docker compose up -d
```

Enter into the php container

```bash
$ docker compose exec -it php bash
```

Install composer dependencies

```bash
/var/www/html# $ composer install
```

Run migrations

```bash
/var/www/html# $ php bin/console doctrine:migrations:migrate --no-interaction
```

Go to [localhost:8080](http://localhost:8080/emails)

The php image already have xDebug listening on port `9003` with server name `serverName=application`
if you want to go step by step

See the full post on [dev.to/adgaray](https://dev.to/adgaray/cqrs-with-symfony-messenger-2h3g) and the [spanish version](https://dev.to/adgaray/cqrs-con-symfony-messenger-espanol-1mep)
