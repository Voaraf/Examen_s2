<?php
require_once("../inc/header.php");
require_once("../inc/fonction.php");
?>
<main>
    <section>
        <div>
            <h2> $obj[$nom ]</h2>
            <img src="<?= $obj['image_principale'] ?>" alt="ds">

            <h3> Autres images</h3>
            <?php foreach ($images as $img) { ?>
                <img src="<?= $img['chemin_image'] ?>" alt="ds">
            <?php } ?>
            
        </div>
    </section>
</main>
