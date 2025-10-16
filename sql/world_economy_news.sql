CREATE DATABASE IF NOT EXISTS world_economy_news CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE world_economy_news;

-- Utilisateurs
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('admin','auteur','lecteur') DEFAULT 'lecteur',
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Themes
CREATE TABLE themes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- Pays
CREATE TABLE pays (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- Regions
CREATE TABLE regions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    id_pays INT NOT NULL,
    FOREIGN KEY (id_pays) REFERENCES pays(id) ON DELETE CASCADE
);

-- Articles
CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    apercu TEXT,
    contenu LONGTEXT NOT NULL,
    image VARCHAR(255),
    id_theme INT,
    id_pays INT,
    id_region INT,
    id_auteur INT,
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_theme) REFERENCES themes(id) ON DELETE SET NULL,
    FOREIGN KEY (id_pays) REFERENCES pays(id) ON DELETE SET NULL,
    FOREIGN KEY (id_region) REFERENCES regions(id) ON DELETE SET NULL,
    FOREIGN KEY (id_auteur) REFERENCES utilisateurs(id) ON DELETE SET NULL
);
