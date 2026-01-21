CREATE DATABASE IF NOT EXISTS careerlink;

use careerlink;

CREATE TABLE IF NOT EXISTS roles (
    id INT PRIMARY KEY,
    title ENUM(
        'admin',
        'recruiter',
        'candidate'
    ) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role_id INT NOT NULL,
    Foreign Key (role_id) REFERENCES roles (id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS candidates (
    id INT PRIMARY KEY,
    current_job VARCHAR(50) NOT NULL,
    profile_picture VARCHAR(100) NOT NULL,
    Foreign Key (id) REFERENCES users (id) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS recruiters (
    id INT PRIMARY KEY,
    company_name VARCHAR(50) NOT NULL,
    company_logo VARCHAR(100) NOT NULL,
    Foreign Key (id) REFERENCES users (id) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY,
    title VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS tags (
    id INT PRIMARY KEY,
    title VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS offers (
    id INT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    location VARCHAR(50) NOT NULL,
    salary FLOAT NOT NULL,
    is_archived BOOLEAN NOT NULL,
    recruiter_id INT NOT NULL,
    category_id INT NOT NULL,
    Foreign Key (recruiter_id) REFERENCES recruiters (id) ON DELETE CASCADE,
    Foreign Key (category_id) REFERENCES categories (id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS tags_offers (
    offer_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (offer_id, tag_id),
    Foreign Key (offer_id) REFERENCES offers (id) ON DELETE CASCADE,
    Foreign Key (tag_id) REFERENCES tags (id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS applications (
    id INT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    status ENUM(
        'waiting',
        'accepted',
        'refused'
    ) NOT NULL,
    response TEXT NOT NULL,
    candidate_id INT NOT NULL,
    offer_id INT NOT NULL,
    Foreign Key (candidate_id) REFERENCES candidates (id) ON DELETE CASCADE,
    Foreign Key (offer_id) REFERENCES offers (id) ON DELETE CASCADE
) ENGINE = InnoDB;