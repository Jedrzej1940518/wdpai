FROM postgres:latest

# Copy the init.sql file into the container
COPY ./init.sql /docker-entrypoint-initdb.d/init.sql

# Change permissions of init.sql
RUN chmod +r /docker-entrypoint-initdb.d/init.sql
