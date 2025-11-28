CREATE DATABASE christian_prayer_board;

USE christian_prayer_board;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

-- Posts table
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    type ENUM('prayer','testimony') NOT NULL,
    title VARCHAR(255),
    content TEXT,
    status ENUM('pending','answered') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

-- Sample user
INSERT INTO users (name,email,password) VALUES
('Test User','test@example.com','$2y$10$Ap2l0dx0uSuaoyWSQn2ToOkyp6UpH9x0LulzjhQYU7lnsrQ/szDXC');
-- Password: 123456

-- Sample posts
INSERT INTO posts (user_id,type,title,content) VALUES
(1,'prayer','Healing for my friend','Please pray for my friend\'s healing'),
(1,'testimony','God answered prayer','I experienced God\'s blessing last week');

