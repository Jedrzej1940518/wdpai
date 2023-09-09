CREATE DATABASE versus_db;

\c versus_db;

CREATE TABLE app_user (
    id serial PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    pro_ids INT[] -- Array of pro IDs associated with the user
);

CREATE TABLE pro (
    id serial PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE account (
    id serial PRIMARY KEY,
    pro_id INT REFERENCES pro(id),
    summoner_name VARCHAR(255) NOT NULL,
    server VARCHAR(255) NOT NULL,
    lp INT
);

-- Create an index on the "email" column for faster lookups (optional)
CREATE INDEX idx_user_email ON app_user (email);
