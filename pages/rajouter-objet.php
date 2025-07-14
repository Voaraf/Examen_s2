<?php
require_once("../inc/header.php");
require_once("../inc/fonction.php");
$cat = get_categorie();
$filtre = $_POST['filtre'] ?? null;
?>
<main class="container py-5">
    <div class="card-custom mx-auto" style="max-width:620px">
        <h1 class="h3 mb-4 text-center">Rajouter un objet</h1>

        <form action="traitement-rajout.php" method="post" enctype="multipart/form-data" class="row g-3">
            <div class="col-12">
                <label for="name" class="form-label">Nom</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="categorie" class="form-label">Catégorie</label>
                <select id="categorie" name="categorie" class="form-select">
                    <?php foreach($cat as $c): ?>
                        <option value="<?= $c['id_categorie']; ?>" <?= $filtre==$c['id_categorie']?'selected':'' ?>>
                            <?= htmlspecialchars($c['nom_categorie']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="image" class="form-label">Images</label>
                <input type="file" id="image" name="image[]" class="form-control" multiple accept="image/*">
            </div>

            <div class="col-12 text-center">
                <button type="submit" name="action" value="add" class="btn btn-primary px-4">
                    <i class="bi bi-plus-circle me-1"></i> Rajouter
                </button>
            </div>
        </form>
    </div>
</main>
