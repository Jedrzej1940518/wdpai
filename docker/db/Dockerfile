FROM postgres:latest

COPY ./init.sql /docker-entrypoint-initdb.d/init.sql

RUN chmod +r /docker-entrypoint-initdb.d/init.sql
