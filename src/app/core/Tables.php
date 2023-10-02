<?php

class Tables {
    // Create the User table
    public const USER_TABLE =
    "CREATE TABLE User (
        user_id SERIAL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        is_admin BOOLEAN NOT NULL
    );";

    // Create the BookOwnership table to represent the relationship between users and books they own
    public const BOOK_OWNERSHIP_TABLE =
    "CREATE TABLE BookOwnership (
        user_id INT REFERENCES User(user_id) ON DELETE SET NULL ON UPDATE CASCADE,
        book_id INT REFERENCES Book(book_id) ON DELETE SET NULL ON UPDATE CASCADE,
        PRIMARY KEY (user_id, book_id)
    );";

    // Create the Book table to store information about books
    public const BOOK_TABLE =
    "CREATE TABLE Book (
        book_id SERIAL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        author VARCHAR(100) NOT NULL,
        book_desc TEXT,
        price DECIMAL(10, 2) NOT NULL,
        publication_date DATE,
        content_url VARCHAR(255), -- URL to the book content (e.g., e-book or audio file)
        cover_img_url VARCHAR(255), -- URL to the book cover image
        audio_url VARCHAR(255) -- URL to the audio content
    );";

    // Create the BookCategory table to represent the relationship between books and categories
    public const BOOK_CATEGORY_TABLE =
    "CREATE TABLE BookCategory (
        category_id SERIAL PRIMARY KEY AUTO_INCREMENT,
        book_id INT REFERENCES Book(book_id) ON DELETE SET NULL
    );";

    // Create the Category table to store book categories
    public const CATEGORY_TABLE =
    "CREATE TABLE Category (
        category_id SERIAL PRIMARY KEY AUTO_INCREMENT,
        category_name VARCHAR(255) NOT NULL
    );";
}
