<?php
    require_once("../inc/header.php");
?>
<main>
    <section>
        <article class="login">
            <h1>Login</h1>
            <form action="traitement-login.php" method="post">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="action" value="login">Se connecter</button>
            </form>
        </article>
    </section>
    <section>
        <a href="index.php">Inscription</a>
    </section>
</main>