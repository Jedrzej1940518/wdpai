CREATE DATABASE versus_db;

\c versus_db;

CREATE TABLE app_user (
    id serial PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create an index on the "email" column for faster lookups (optional)
CREATE INDEX idx_user_email ON app_user (email);
