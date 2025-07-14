<?php
require("../inc/fonction.php");

    $action = $_POST['action'] ?? '';
    $password = $_POST['password'];
    $email = $_POST['email'];


    if ($action === 'login') {
        verifier($email, $password);
        header("Location: ../pages/liste.php?success=Login successful");
    }