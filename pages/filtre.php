<?php
require_once("../inc/header.php");
require_once("../inc/fonction.php");

$cat = get_categorie();
$filtre = isset($_POST['filtre']) ? $_POST['filtre'] : null;

if ($filtre !== null) {
    $objet_info = filtrer_categorie($filtre);
} else {
    $objet_info = info_objet();
}
?>

<main>
    <section class = "container">
        <form action="filtre.php" method="POST">
            <label for="categorie"><strong>Catégorie</strong></label>
            <select name="filtre" id="categorie">
                <?php for ($i = 0; $i < count($cat); $i++) {
                    $selected = ($filtre == $cat[$i]['id_categorie']) ? 'selected' : '';
                    ?>
                    <option value="<?= $cat[$i]['id_categorie']; ?>" <?= $selected ?>>
                        <?= htmlspecialchars($cat[$i]['nom_categorie']); ?>
                    </option>
                <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>
    </section>

    <section>
    <h1><strong>Liste d'objet pour 
    <?php
    $nom_categorie = 'toutes les catégories';
    if ($filtre !== null) {
        for ($i = 0; $i < count($cat); $i++) {
            if ($cat[$i]['id_categorie'] == $filtre) {
                $nom_categorie = $cat[$i]['nom_categorie'];
                break;
            }
        }
    }
    echo $nom_categorie;
    ?>
</strong></h1>

        <?php if (is_array($objet_info) && count($objet_info) > 0) { ?>
            <ul>
                <?php for ($j = 0; $j < count($objet_info); $j++) { ?>
                    <li><?= htmlspecialchars($objet_info[$j]['nom_objet']); ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Aucun objet trouvé.</p>
        <?php } ?>
    </section>
</main>
