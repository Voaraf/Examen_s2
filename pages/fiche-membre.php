<?php
    require_once("../inc/header.php");
    require_once("../inc/fonction.php");
    $id_Membre = $_SESSION['id_membre'];
    $membre = membre_byId($id_Membre);
    $emprunt = emprunt_byId($id_Membre);
?>
<main>
    <section class="container">
        <p><strong>Nom:</strong><?= $membre['nom'];?></p>
        <p><strong>Date de naissance:</strong><?= $membre['date_naissance'];?></p>
        <p><strong>Genre:</strong><?= $membre['genre'];?></p>
        <p><strong>Ville:</strong><?= $membre['ville'];?></p>
        <p><strong>Email:</strong><?= $membre['mail'];?></p>

    </section>
    <section>
        <form action="traitement-retour.php" method="post" enctype="multipart/form-data">
     <?php if (!empty($emprunt)) { ?>
    <?php foreach ($emprunt as $empr) { ?>
        <article class="container">
            <p name ="objet"><strong>Objet:</strong><?= $empr['nom_objet'];?></p>
            <p><strong>Date d'emprunt:</strong><?= $empr['date_emprunt'];?></p>
            <p><strong>Date de retour:</strong><?= $empr['date_retour'];?></p>
        </article>
    <?php } ?>
<?php } else { ?>
    <p>Aucun objet emprunté.</p>
<?php } ?>
    <p>
    <label for="retour">Retourner:</label>
    <select name="retour">
        <option value="ok">Bon etat</option>
        <option value="abime">Abimer</option>
    </select>
<button type="submit" name="action">Valider</button>
 </form>

</p>

    </section>
</main>