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

CREATE INDEX idx_user_email ON app_user (email);

INSERT INTO pro (name) VALUES
    ('Faker'),
    ('Caps'),
    ('Baus');

INSERT INTO account (pro_id, summoner_name, server, lp) VALUES
    ((SELECT id FROM pro WHERE name = 'Faker'), 'SKT Faker', 'KR', 1000),
    ((SELECT id FROM pro WHERE name = 'Caps'), 'G2 Caps', 'KR', 500),
    ((SELECT id FROM pro WHERE name = 'Baus'), 'thebausffs', 'KR', 200);