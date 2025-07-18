CREATE OR REPLACE VIEW Emprunt_view_info_objet AS
SELECT
    o.id_objet,
    o.nom_objet,
    c.nom_categorie,
    m.nom AS nom_proprietaire,
    e.date_emprunt,
    e.date_retour
FROM Emprunt_objet o
JOIN Emprunt_categorie_objet c ON o.id_categorie = c.id_categorie
JOIN Emprunt_membre m ON o.id_membre = m.id_membre
LEFT JOIN Emprunt_emprunt e
       ON o.id_objet = e.id_objet AND e.date_retour 
ORDER BY o.nom_objet;

CREATE OR REPLACE VIEW Emprunt_view_cat AS
SELECT
    c.id_categorie,
    c.nom_categorie
FROM Emprunt_categorie_objet c
ORDER BY c.nom_categorie;

CREATE OR REPLACE VIEW Emprunt_view_categorie AS
SELECT
    o.id_objet,
    o.nom_objet,
    c.id_categorie,
    c.nom_categorie
FROM Emprunt_objet AS o
JOIN Emprunt_categorie_objet AS c
  ON o.id_categorie = c.id_categorie
ORDER BY c.nom_categorie, o.nom_objet;

CREATE OR REPLACE VIEW Emprunt_view_info_user AS
SELECT
    m.id_membre,
    m.nom,
    m.date_naissance,
    m.mail,
    m.genre,
    m.ville,
    m.image_profil
FROM Emprunt_membre m;   

CREATE OR REPLACE VIEW Emprunt_view_info_emprunt AS
SELECT
    e.id_membre,
    o.nom_objet,
    m.nom AS nom_membre,
    e.date_emprunt,
    e.date_retour
FROM Emprunt_emprunt e
JOIN Emprunt_objet o ON e.id_objet = o.id_objet
JOIN Emprunt_membre m ON e.id_membre = m.id_membre
ORDER BY e.date_emprunt DESC;

ALTER TABLE Emprunt_emprunt
ADD COlUMN statut_etat ENUM('OK', 'Abimé') DEFAULT NULL;

