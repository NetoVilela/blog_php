CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    created TIMESTAMP(0) DEFAULT NULL,
    modified TIMESTAMP(0) DEFAULT NULL
);

CREATE TABLE posts (
    id SERIAL PRIMARY KEY,
    id_user INT NOT NULL,
    title VARCHAR(50),
    body TEXT,
    active boolean,
    created TIMESTAMP(0) DEFAULT NULL,
    modified TIMESTAMP(0) DEFAULT NULL,
    FOREIGN KEY (id_user) REFERENCES users (id)
);

INSERT INTO users (username, password, role)
    VALUES ('neto', '1234', 'Admin');
