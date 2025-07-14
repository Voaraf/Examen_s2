<?php
require("connexion.php");
session_start();

function inscrire($image, $name, $date, $genre, $ville, $email, $password) {
    $sql = "INSERT INTO Emprunt_membre (nom, date_naissance, genre, mail, ville, mdp, image_profil) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
    $sql = sprintf($sql, $name, $date, $genre, $email, $ville, $password, $image);
    mysqli_query(bdconnect(), $sql);
}
function verifier($email, $password) {
    $sql = "SELECT * FROM Emprunt_membre WHERE mail = '%s' AND mdp = '%s'";
    $sql = sprintf($sql, $email, $password);
    $result = mysqli_query(bdconnect(), $sql);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id_membre'] = $user['id_membre'];
        header("Location: ../pages/liste.php");
    } else {
        header("Location: ../pages/index.php?error=Invalid credentials"); 
}
}
function getUserInfo($id_membre) {
    $sql = "SELECT * FROM Emprunt_view_info_user WHERE id_membre = '%s'";
    $sql = sprintf($sql, $id_membre);
    $result = mysqli_query(bdconnect(), $sql);
    return mysqli_fetch_assoc($result);
}

function info_objet() {
    $sql = "SELECT * FROM Emprunt_view_info_objet";
    $result = mysqli_query(bdconnect(), $sql);
    $objets = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $objets[] = $row;
    }
    return $objets;

}

function get_categorie() {
    $sql = "SELECT * FROM Emprunt_categorie_objet";
    $result = mysqli_query(bdconnect(), $sql);
    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
    return $categories;
}

function filtrer_categorie($id_categorie) {
    $sql = "SELECT * FROM Emprunt_view_categorie WHERE id_categorie = '%s'";
    $sql = sprintf($sql, $id_categorie);
    $result = mysqli_query(bdconnect(), $sql);
    $objets = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $objets[] = $row;
    }
    return $objets;
}