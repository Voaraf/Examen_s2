<?php
    require_once("../inc/header.php");
    require_once("../inc/fonction.php");
    $id_Membre = $_SESSION['id_membre'];
    $membre = membre_byId($id_Membre);

?>
<main>
    <section class="container">
        <p><strong>Nom:</strong><?= $membre['nom'];?></p>
        <p><strong>Date de naissance:</strong><?= $membre['date_naissance'];?></p>
        <p><strong>Genre:</strong><?= $membre['genre'];?></p>
        <p><strong>Ville:</strong><?= $membre['ville'];?></p>
        <p><strong>Email:</strong><?= $membre['mail'];?></p>

    </section>
</main>