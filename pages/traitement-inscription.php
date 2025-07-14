<?php
require("../inc/fonction.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $image = $_FILES['image']['name'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $genre = $_POST['genre'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    inscrire($image, $name, $date, $genre, $ville, $email, $password);
    header("Location: ../pages/liste.php?success=Registration successful");

}
