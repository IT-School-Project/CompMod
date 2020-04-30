CREATE DATABASE compmod;

USE compmod;

CREATE TABLE users (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address1 VARCHAR(255) NOT NULL,
    address2 VARCHAR(255),
    post_nr INTEGER NOT NULL
);

--if profile picture is not provided. automatically make it a basic one 

CREATE TABLE listing (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    date DATETIME NOT NULL,
    description TEXT NOT NULL,
    user INTEGER NOT NULL,
    img VARCHAR(31)
);

-- IMPORT TABLE post_nr

CREATE TABLE cart (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    listing_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL
);

CREATE TABLE orders (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    seller INTEGER NOT NULL,
    buyer INTEGER NOT NULL
);

CREATE TABLE img (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255) NOT NULL
);

CREATE TABLE ximg (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    listing_id INTEGER NOT NULL,
    img_id INTEGER NOT NULL
);

CREATE TABLE xparts (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    listing_id INTEGER NOT NULL,
    parts_id INTEGER NOT NULL,
    important BINARY NOT NULL
);

CREATE TABLE parts (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    cat_id INTEGER
);

CREATE TABLE category (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL
);

CREATE TABLE xspec (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    spec_id INTEGER NOT NULL,
    parts_id INTEGER NOT NULL
);

CREATE TABLE spec (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    spec VARCHAR(255) NOT NULL,
    type INTEGER NOT NULL
);

CREATE TABLE type (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE admin ( 
    user_id INTEGER PRIMARY KEY
);