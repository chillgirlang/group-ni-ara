CREATE DATABASE login_system;

USE login_system;

CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL, 
    PRIMARY KEY (id)
);

INSERT INTO users (username, password) 
VALUES ('user', 'user123');

Select * from users;