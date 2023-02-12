CREATE DATABASE peri;
USE peri;

CREATE TABLE tasks (
                       id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       task_date DATE NOT NULL,
                       task_name VARCHAR(50) NOT NULL,
                       task_desc TEXT
);