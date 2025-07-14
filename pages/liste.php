<?php
    require_once("../inc/header.php");
    require_once("../inc/fonction.php");
    $objet_info = info_objet();

?>
<main>
    <section>
        <h1><strong>LISTE OBJET</strong></h1>
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Date d'emprunt</th>
                    <th>Date de retour</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($objet_info as $objet) { ?>
                        <tr>
            
                            <td> <a href="fiche.php?ind=<?= $objet['id_objet']; ?>"><?php echo htmlspecialchars($objet['nom_objet']); ?></a></td>
                            <td><?php echo htmlspecialchars($objet['nom_categorie']); ?></td>
                            <td><?php echo htmlspecialchars($objet['date_emprunt']); ?></td>
                            <td><?php echo htmlspecialchars($objet['date_retour']); ?></td>
                        </tr>
                    <?php } ?>
                </tr>
            </tbody>
        </table>    
    </section>
</main>