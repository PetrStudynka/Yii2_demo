# Library app

Yii2 demo

## Setup

Without docker change dsn in /config/db.php

## Run

Localhost:

`php yii serve`

or
Docker:

`docker-composer up --build`

## Useful db commands

Migration for DB init

`php yii migrate/fresh (prompt - yes,yes)`

or use included dump.sql

`docker exec -i db_mysql mysql -uroot -proot db < dump.sql`

Dump mysql from container for later use

`docker exec -i db_mysql mysqldump --single-transaction=TRUE --default-character-set=utf8mb4 -u root -p db --skip-comments > ./dump.sql`
