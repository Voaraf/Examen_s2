<?php
    require_once("../inc/header.php");
?>
<main>
    <section class="container"> 
        <form action="traitement-emprunt.php" method="post">
            <label for="jour">Combien de jour:</label>
            <input type="number" id="jour" name="jour" required>
            <button type="submit" name="action" value="emprunter">Emprunter</button>
        </p>

    </section>
</main>