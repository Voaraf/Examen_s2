<?php
    require_once("../inc/header.php");

?>
<main>
    <section>
        <article class="inscription">
            <h1>Inscription</h1>
            <form action="traitement-inscription.php" method="post">

                <label for="image">Photo de profil</label>
                <input type="file" id="image" name="image" accept="image/*">

                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" required>

                <label for="date">Date de naissance:</label>
                <input type="date" id="date" name="date" required>

                <label for="genre">Genre:</label>
                <select name="genre">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>

                <label for="ville">Ville:</label>
                <input type="text" id="ville" name="ville" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>


                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="action" value="register">S'inscrire</button>
            </form>
        </article>
    </section>
    <section>
        <a href="login.php">Login</a>
    </section>
</main>


</body>
</html>