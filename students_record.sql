-- SQL script for Student Registration App

-- Create the database
CREATE DATABASE IF NOT EXISTS school_db;

-- Use the database
USE school_db;

-- Create the student_records table
CREATE TABLE IF NOT EXISTS student_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    department VARCHAR(100) NOT NULL,
    matric_number VARCHAR(50) NOT NULL
);