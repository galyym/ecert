FROM mysql/mysql-server:8.0

COPY ./docker/db/b2b_telegram_bot.sql /docker-entrypoint-initdb.d/loc_user.sql

RUN chmod -R 0755 /docker-entrypoint-initdb.d
