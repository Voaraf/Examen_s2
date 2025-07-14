<?php
    require_once("../inc/header.php");
    require_once("../inc/fonction.php");
    $cat = get_categorie();
    $filtre = isset($_GET['filtre']) ? $_GET['filtre'] : null;
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['filtre'])) {
        $filtre = $_GET['filtre'];
        $objet_info = filtrer_categorie($filtre);
        header("Location:filtre.php?filtre=$filtre");
    } else {
        $objet_info = info_objet();
    }


?>
<main>
    <section>
        <label for="categorie"><strong>Catégorie</strong></label>
        <select name="filtre">
            <?php for($i=0; $i< count($cat); $i++) { ?>
        <form action="filtre.php?categorie= <?= $cat[$i]['nom_categorie'] ?>" method="GET">
                    <option value="<?php echo $cat[$i]['id_categorie']; ?>" <?php if ($filtre == $cat[$i]['id_categorie']); ?>>
                        <?php echo htmlspecialchars($cat[$i]['nom_categorie']); ?>
                    </option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </form>
    </section>
    <section>
        <h1><strong>LISTE OBJET par <?=   $objet_info;?></strong></h1>
</main>