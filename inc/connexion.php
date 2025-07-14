<?php

function bdconnect()
{
    static $connect = null;

    if ($connect === null) {
        $connect = mysqli_connect('localhost','root','','emprunt');
        //$connect = mysqli_connect('localhost','ETU004244','i07qXbtG','db_s2_ETU004244');

        if (!$connect) {
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }
        mysqli_set_charset($connect, 'utf8mb4');
    }   
    return $connect;
}

?>
