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
    name VARCHAR(255) NOT NULL,
    img_exists BOOLEAN
);

CREATE TABLE account (
    id serial PRIMARY KEY,
    pro_id INT REFERENCES pro(id),
    summoner_name VARCHAR(255) NOT NULL,    
    server VARCHAR(255) NOT NULL,
    lp INT
);

CREATE TABLE match (
    id serial PRIMARY KEY,
    account_id INT REFERENCES account(id),
    kills INT,
    deaths INT,
    assists INT,
    rank VARCHAR(2),
    champion VARCHAR(255)
);

CREATE INDEX idx_user_email ON app_user (email);

INSERT INTO pro (name, img_exists) VALUES
    ('Faker', true),
    ('Caps', true),
    ('Baus', false);

INSERT INTO account (pro_id, summoner_name, server, lp) VALUES
    ((SELECT id FROM pro WHERE name = 'Faker'), 'SKT Faker', 'KR', 1000),
    ((SELECT id FROM pro WHERE name = 'Caps'), 'G2 Caps', 'KR', 500),
    ((SELECT id FROM pro WHERE name = 'Baus'), 'thebausffs', 'KR', 200);

DO $$ 
BEGIN
    FOR i IN 1..5 LOOP

        INSERT INTO match (account_id, kills, deaths, assists, rank, champion)
            SELECT a.id AS account_id, 
                2 AS kills, 
                5 AS deaths, 
                2 AS assists, 
                'B-' AS rank, 
                'Teemo' AS champion
            FROM account a
            JOIN pro p ON a.pro_id = p.id
            WHERE p.name = 'Caps'
            LIMIT 1;

        INSERT INTO match (account_id, kills, deaths, assists, rank, champion)
            SELECT a.id AS account_id, 
                10 AS kills, 
                16 AS deaths, 
                2 AS assists, 
                'A-' AS rank, 
                'Sion' AS champion
            FROM account a
            JOIN pro p ON a.pro_id = p.id
            WHERE p.name = 'Baus'
            LIMIT 1;

        INSERT INTO match (account_id, kills, deaths, assists, rank, champion)
            SELECT a.id AS account_id, 
                13 AS kills, 
                7 AS deaths, 
                11 AS assists, 
                'S-' AS rank, 
                'Azir' AS champion
            FROM account a
            JOIN pro p ON a.pro_id = p.id
            WHERE p.name = 'Faker'
            LIMIT 1;

    END LOOP;
END $$;