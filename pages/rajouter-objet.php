<?php
    require_once("../inc/header.php");
    require_once("../inc/fonction.php");

$cat = get_categorie();
$filtre = isset($_POST['filtre']) ? $_POST['filtre'] : null;

?>
<main>
    <section>
        <article class="inscription container">
            <h1>Rajouter ojet</h1>
            <form action="traitement-rajout.php" method="post" enctype="multipart/form-data">
                <p>
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="name" required>
                </p>
                <p>
                    <label for="categorie"><strong>Catégorie</strong></label>
                    <select name="categorie" id="categorie">
                        <?php for ($i = 0; $i < count($cat); $i++) {
                            $selected = ($filtre == $cat[$i]['id_categorie']) ? 'selected' : '';
                            ?>
                            <option value="<?= $cat[$i]['id_categorie']; ?>" <?= $selected ?>>
                                <?= htmlspecialchars($cat[$i]['nom_categorie']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </p>
                <p>
                    <label for="image">Images</label>
                    <input type="file" id="image" name="image[]" multiple accept="image/*">
                </p>

                <button type="submit" name="action" value="add">Rajouter</button>
            </form>
        </article>
    </section>
</main>


</body>
</html>