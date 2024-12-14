-- Create database
CREATE DATABASE taskflow;

-- Use the database
USE taskflow;

-- Create table for users
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone_number VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create table for makanan
CREATE TABLE tasks (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('To-Do', 'In Progress', 'Done') DEFAULT 'To-Do',
    due_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Data untuk tabel users
INSERT INTO users (name, email, phone_number)
VALUES 
('John Doe', 'johndoe@example.com', '+1234567890'),
('Jane Smith', 'janesmith@example.com', '+9876543210');

-- Data untuk tabel tasks
INSERT INTO tasks (user_id, title, description, status, due_date)
VALUES
(1, 'Complete User Authentication', 'Implement login and registration system', 'To-Do', '2024-12-31'),
(1, 'Setup Database Schema', 'Design and create the initial database schema', 'In Progress', '2024-12-20'),
(2, 'Landing Page Design', 'Create a responsive design for the landing page', 'Done', '2024-12-10');