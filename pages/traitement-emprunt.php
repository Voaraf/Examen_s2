<?php
    require_once("../inc/fonction.php");
    $jour = $_GET['jour'] ?? '';
    $objet_emprunter = $_GET['objet'] ?? '';

    emprunter_objet($objet_emprunter, $jour);
