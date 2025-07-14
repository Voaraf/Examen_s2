<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employees DB - Départements</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../assets/css/style.css">

        
</head>
<body>
<main>
    <section>
        <article class="inscription container">
            <h1>Inscription</h1>
            <form action="traitement-inscription.php" method="post" enctype="multipart/form-data">

                <p>
                    <label for="image">Photo de profil</label>
                    <input type="file" id="image" name="image" >
                </p>
                
                <p>
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="name" required>
                </p>

                <p>
                    <label for="date">Date de naissance:</label>
                    <input type="date" id="date" name="date" required>
                </p>

                <p>
                    <label for="genre">Genre:</label>
                    <select name="genre">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </p>

                <p>
                    <label for="ville">Ville:</label>
                    <input type="text" id="ville" name="ville" required>
                </p>

                <p>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </p>


                <p>
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" required>
                </p>

                <button type="submit" name="action" value="register">S'inscrire</button>
            </form>
            <a href="login.php">Login</a>
        </article>
    </section>
</main>


</body>
</html>