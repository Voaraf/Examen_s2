<?php
require("connexion.php");
session_start();

function inscrire($image, $nom, $dateNaissance, $genre, $ville, $email, $password) {
    $uploadDir = __DIR__ . '/../uploads/';
    $maxSize = 2 * 1024 * 1024;
    $allowedMime = ['image/jpeg', 'image/png'];

    if ($image['error'] !== UPLOAD_ERR_OK) {
        die('Erreur lors de l’upload : ' . $image['error']);
    }

    if ($image['size'] > $maxSize) {
        die('Le fichier image est trop volumineux.');
    }

    $mime = mime_content_type($image['tmp_name']);
    if (!in_array($mime, $allowedMime)) {
        die('Type de fichier non autorisé : ' . $mime);
    }

    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $newName = pathinfo($image['name'], PATHINFO_FILENAME) . '_' . uniqid() . '.' . $ext;

    if (!move_uploaded_file($image['tmp_name'], $uploadDir . $newName)) {
        die('Échec du déplacement de l’image.');
    }

    $sql_insert = "INSERT INTO Emprunt_membre
        (nom, date_naissance, genre, mail, ville, mdp, image_profil)
        VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')";

    $conn = bdconnect();
    $sql = sprintf(
        $sql_insert,
        mysqli_real_escape_string($conn, $nom),
        mysqli_real_escape_string($conn, $dateNaissance),
        mysqli_real_escape_string($conn, $genre),
        mysqli_real_escape_string($conn, $email),
        mysqli_real_escape_string($conn, $ville),
        mysqli_real_escape_string($conn, $password),
        mysqli_real_escape_string($conn, $newName)
    );

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../pages/liste.php?success=Registration successful");
    } else {
        header("Location: ../pages/index.php?error=Insertion échouée");
    }
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
function rajouter_objet($name, $categorie, $image)
{
    $uploadDir = __DIR__ . '/../uploads/';
@mkdir($uploadDir, 0755, true);

$maxSize = 2 * 1024 * 1024;
$allowedMime = ['image/jpeg', 'image/png'];

$conn = bdconnect();
mysqli_set_charset($conn, 'utf8');

$nom = mysqli_real_escape_string($conn, $name);
$cat = (int)$categorie;
$idMembre = (int)$_SESSION['id_membre'];

$sql_obj = "INSERT INTO Emprunt_objet (nom_objet, id_categorie, id_membre)
            VALUES ('$nom', $cat, $idMembre)";
if (!mysqli_query($conn, $sql_obj)) {
    header("Location: ../pages/rajouter-objet.php?error=Erreur base");
    exit;
}
$idObjet = mysqli_insert_id($conn);

$nbFichiers = count($image['name']);

for ($i = 0; $i < $nbFichiers; $i++) {
    if ($image['error'][$i] === UPLOAD_ERR_OK) {
        $tmp = $image['tmp_name'][$i];
        $mime = mime_content_type($tmp);
        if (!in_array($mime, $allowedMime)) continue;

        if ($image['size'][$i] > $maxSize) continue;

        $ext = pathinfo($image['name'][$i], PATHINFO_EXTENSION);
        $base = pathinfo($image['name'][$i], PATHINFO_FILENAME);
        $newName = $base . '_' . uniqid() . '.' . strtolower($ext);

        if (move_uploaded_file($tmp, $uploadDir . $newName)) {
            $fileNameSql = mysqli_real_escape_string($conn, $newName);
            mysqli_query($conn,
                "INSERT INTO Emprunt_images_objet (id_objet, nom_image)
                 VALUES ($idObjet, '$fileNameSql')"
            );
        }
    }
}
header("Location: ../pages/liste.php?success=Objet ajouté avec succès");
exit;

}

function objet_byId($id_objet) {
    $sql = "SELECT * FROM Emprunt_view_info_objet WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id_objet);
    $result = mysqli_query(bdconnect(), $sql);
    return mysqli_fetch_assoc($result);
}

function membre_byId($id_membre) {
    $sql = "SELECT * FROM Emprunt_view_info_user WHERE id_membre = '%s'";
    $sql = sprintf($sql, $id_membre);
    $result = mysqli_query(bdconnect(), $sql);
    return mysqli_fetch_assoc($result);
}