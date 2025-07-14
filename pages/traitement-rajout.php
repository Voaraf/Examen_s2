<?php
session_start();
require_once("../inc/fonction.php");

if (!isset($_SESSION['id_membre'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add') {
    $nom = $_POST['name'] ?? '';
    $categorie = $_POST['categorie'] ?? 0;
    $images = $_FILES['image'] ?? null;

    if (rajouter_objet($nom, $categorie, $images)) {
        header('Location: liste.php?success=1');
    } else {
        header('Location: rajouter-objet.php?error=Insertion échouée');
    }
    exit;
}
