<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employees DB - Départements</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        
</head>
<body>
    
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
</body>