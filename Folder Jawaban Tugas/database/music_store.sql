-- Music Store Management Database Schema
CREATE DATABASE music_store;
USE music_store;

-- Artists table
CREATE TABLE artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    country VARCHAR(50),
    formed_year INT
);

-- Albums table with FK to artists
CREATE TABLE albums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    release_year INT,
    genre VARCHAR(50),
    artist_id INT NOT NULL,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
);

-- Songs table with FK to albums
CREATE TABLE songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    duration VARCHAR(10),
    album_id INT NOT NULL,
    track_number INT,
    FOREIGN KEY (album_id) REFERENCES albums(id)
);

-- Sample data
INSERT INTO artists (name, country, formed_year) VALUES 
('Queen', 'United Kingdom', 1970),
('Coldplay', 'United Kingdom', 1996),
('Daft Punk', 'France', 1993);

INSERT INTO albums (title, release_year, genre, artist_id) VALUES 
('A Night at the Opera', 1975, 'Rock', 1),
('A Rush of Blood to the Head', 2002, 'Alternative Rock', 2),
('Random Access Memories', 2013, 'Electronic', 3);

INSERT INTO songs (title, duration, album_id, track_number) VALUES 
('Bohemian Rhapsody', '5:55', 1, 11),
('The Prophet\'s Song', '8:21', 1, 8),
('Love of My Life', '3:38', 1, 9),
('Clocks', '5:07', 2, 5),
('The Scientist', '5:09', 2, 4),
('Get Lucky', '6:07', 3, 8),
('Instant Crush', '5:37', 3, 5);
