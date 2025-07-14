CREATE DATABASE emprunt;
use emprunt;

CREATE TABLE emprunt_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    date_naissance DATE,
    genre VARCHAR(10),
    mail VARCHAR(100) UNIQUE,
    ville VARCHAR(100),
    mdp VARCHAR(255) ,
    image_profil VARCHAR(255)
);

CREATE TABLE emprunt_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100) UNIQUE
);

CREATE TABLE emprunt_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_membre INT,
    id_categorie INT    
);