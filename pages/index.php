<?php
    require_once("../inc/header.php");

?>
<main>
    <section>
        <article class="inscription">
            <h1>Inscription</h1>
            <form action="traitement-inscription.php" method="post">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">S'inscrire</button>
            </form>
        </article>
    </section>
</main>

</body>
</html>