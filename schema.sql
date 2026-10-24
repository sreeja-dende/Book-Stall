-- Run once in MySQL (e.g. phpMyAdmin) before using login/register
CREATE DATABASE IF NOT EXISTS dbms;
USE dbms;

CREATE TABLE IF NOT EXISTS bookstall (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullName VARCHAR(100) NOT NULL UNIQUE,
  email VARCHAR(150) NOT NULL UNIQUE,
  phone VARCHAR(20) NOT NULL,
  address TEXT NOT NULL,
  password VARCHAR(255) NOT NULL,          -- password_hash() output
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
