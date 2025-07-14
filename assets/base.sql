CREATE DATABASE emprunt;
use emprunt;

CREATE TABLE Emprunt_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    date_naissance DATE,
    genre VARCHAR(10),
    mail VARCHAR(100) UNIQUE,
    ville VARCHAR(100),
    mdp VARCHAR(255),
    image_profil VARCHAR(255)
);

CREATE TABLE Emprunt_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100) UNIQUE
);

CREATE TABLE Emprunt_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_membre INT,
    id_categorie INT,    
    FOREIGN KEY (id_membre) REFERENCES Emprunt_membre(id_membre),
    FOREIGN KEY (id_categorie) REFERENCES Emprunt_categorie_objet(id_categorie)

);

CREATE TABLE Emprunt_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES Emprunt_objet(id_objet) 
);
CREATE TABLE Emprunt_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES Emprunt_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES Emprunt_membre(id_membre) 
);

--donnee de test:
INSERT INTO Emprunt_membre (nom, date_naissance, genre, mail, ville, mdp, image_profil) VALUES
('Bob Martin', '1985-05-15', 'Homme', 'bob@gmail.com', 'Lyon','bob123', 'bob.jpg'),
('Claire Dubois', '1992-03-20', 'Femme', 'claire@gmail.com', 'Marseille', 'claire123', 'claire.jpg'),
('David Lefevre', '1988-07-30', 'Homme', 'david@gmail.com', 'Toulouse', 'david123', 'david.jpg'),
('Eva Moreau', '1995-11-10', 'Femme', 'emma@gmail.com', 'Bordeaux', 'emma123', 'emma.jpg');

INSERT INTO Emprunt_categorie_objet (nom_categorie) VALUES
('esthétique'),
('bricolage'),
('mécanique'),
('cuisine');

INSERT INTO Emprunt_objet (nom_objet, id_membre, id_categorie) VALUES
('Rouge à lèvres', 1, 1),
('Crème hydratante', 1, 1),
('Fond de teint', 1, 1),
('Perceuse sans fil', 1, 2),
('Tournevis électrique', 1, 2),
('Scie sauteuse', 1, 2),
('Clé à molette', 1, 3),
('Clé à cliquet', 1, 3),
('Couteau de chef', 1, 4),
('Mixeur plongeant', 1, 4),

('Mascara', 2, 1),
('Rouge à lèvres mat', 2, 1),
('Crème solaire', 2, 1),
('Eyeliner', 2, 1),
('Perceuse à percussion', 2, 2),
('Pince multiprise', 2, 3),
('Clé Allen', 2, 3),
('Casserole en inox', 2, 4),
('Poêle antiadhésive', 2, 4),
('Friteuse électrique', 2, 4),

('Crème anti-âge', 3, 1),
('Pinceau à maquillage', 3, 1),
('Scie circulaire', 3, 2),
('Pince à épiler électrique', 3, 2),
('Perceuse à colonne', 3, 2),
('Clé dynamométrique', 3, 3),
('Mixeur à main', 3, 4),
('Robot culinaire', 3, 4),
('Couteau à pain', 3, 4),
('Planche à découper en bois', 3, 4),

('Crème pour les mains', 4, 1),
('Eau micellaire', 4, 1),
('Pinceau à blush', 4, 1),
('Perceuse à percussion sans fil', 4, 2),
('Scie à onglet', 4, 2),
('Clé à pipe', 4, 3),
('Couteau de cuisine japonais', 4, 4),
('Batte à œufs électrique', 4, 4),
('Moule à gâteau en silicone', 4, 4),
('Mixeur à smoothie', 4, 4);

INSERT INTO Emprunt_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 1, '2023-10-01', '2023-10-15'),
(2, 1, '2023-10-02', '2023-10-16'),
(3, 2, '2023-10-03', '2023-10-17'),
(4, 4, '2023-10-04', '2023-10-18'),
(5, 3, '2023-10-05', '2023-10-19'),
(6, 3, '2023-10-06', '2023-10-20'),
(7, 4, '2023-10-07', '2023-10-21'),
(8, 1, '2023-10-08', '2023-10-22'),
(9, 2, '2023-10-09', '2023-10-23'),
(10, 2, '2023-10-10', '2023-10-24');