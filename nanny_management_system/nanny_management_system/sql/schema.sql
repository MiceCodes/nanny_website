CREATE DATABASE nanny_management;

USE nanny_management;

CREATE TABLE users(
    userid INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    role VARCHAR(50)
);

CREATE TABLE bookings(
    bookingid INT AUTO_INCREMENT PRIMARY KEY,
    parentid INT,
    nannyid INT,
    bookingdate DATE,
    status VARCHAR(50)
);

INSERT INTO users(fullname,email,password,role)
VALUES('Admin User','admin@nanny.com','$2y$10$examplehash','Admin');
