<?php
require_once("../inc/header.php");
require_once("../inc/fonction.php");
$id_objet = $_GET['ind'] ?? null;
$obj = objet_byId($id_objet);

?>
<main>
    <section class="container">
        <div>
            <h2><?= $obj['nom_objet']; ?></h2>
            <p><strong>Catégorie:</strong> <?= $obj['nom_categorie']; ?></p>
            <p><strong>Propriétaire:</strong> <?= $obj['nom_proprietaire']; ?></p>
            <p><strong>Date d'emprunt:</strong> <?= $obj['date_emprunt'] ?: 'Aucun emprunt'; ?></p>
            <p><strong>Date de retour:</strong> <?= $obj['date_retour'] ?: 'Aucun retour'; ?></p>
            <p><strong>Images:</strong></p>
            <div class="row">
                <?php
                $images = explode(',', $obj['images'] ?? null);
                foreach ($images as $image) {
                    if (!empty($image)) {
                        echo '<div class="col-md-4 mb-3">';
                        echo '<img src="../assets/images/' . htmlspecialchars($image) . '" class="img-fluid" alt="Image de l\'objet">';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </section>
</main>
