-- Create the database
CREATE DATABASE IF NOT EXISTS fitzone_db;
USE fitzone_db;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Trainers table
CREATE TABLE IF NOT EXISTS trainers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    specialties TEXT,
    bio TEXT,
    achievements TEXT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Classes table
CREATE TABLE IF NOT EXISTS classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    trainer_id INT,
    start_time TIME,
    end_time TIME,
    days VARCHAR(100),
    capacity INT DEFAULT 20,
    FOREIGN KEY (trainer_id) REFERENCES trainers(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Enrollments table
CREATE TABLE IF NOT EXISTS enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    class_id INT,
    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (class_id) REFERENCES classes(id)
);

-- Blog posts table
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    author_id INT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id)
);

-- Reviews table
CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Contact messages table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(255),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO users (name, email, password, is_admin) VALUES
('Admin User', 'admin@fitzone.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', TRUE),
('John Doe', 'john@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', FALSE);

INSERT INTO trainers (name, specialties, bio, achievements) VALUES
('John Smith', 'Strength Training, Powerlifting', 'Professional trainer with 10 years of experience', 'Certified Personal Trainer, Competition Winner 2022'),
('Jane Doe', 'Cardio, HIIT, Boxing', 'Specializes in high-intensity workouts', 'Fitness Champion 2021, Certified Boxing Instructor');

INSERT INTO classes (name, description, trainer_id, start_time, end_time, days) VALUES
('Strength Training', 'Build muscle and strength', 1, '09:00:00', '10:00:00', 'Monday, Wednesday, Friday'),
('Cardio Warriors', 'High-intensity cardio workout', 2, '11:00:00', '12:00:00', 'Tuesday, Thursday');

-- Sample blog post
INSERT INTO blog_posts (title, content, author_id) VALUES
('Getting Started with Strength Training', 'Learn the basics of strength training...', 1);

-- Sample review
INSERT INTO reviews (user_id, rating, comments) VALUES
(2, 5, 'Great gym with excellent trainers!');
