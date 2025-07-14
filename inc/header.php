<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employees DB - Départements</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        
        <style>
            body {
                background-color: #f1f3f5;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
            }
            
            .container {
                margin-top: 60px;
            }
            
            h1 {
                margin-bottom: 30px;
                color: #343a40;
            }

            table {
                width: 100%;
                background-color: white;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            }
            
            thead th {
                background-color:rgb(25, 27, 29);
                color: white;
                text-transform: uppercase;
                font-size: 0.9rem;
                letter-spacing: 1px;
            }
            
            tbody td {
                vertical-align: middle;
            }
            
            td, th {
                padding: 12px 15px;
                border: 1px solid #dee2e6;
                text-align: center;
            }
            
            td img {
                width: 24px;
                height: 24px;
                transition: transform 0.2s;
            }

            td img:hover {
                transform: scale(1.2);
            }

            .link-btn {
                text-decoration: none;
                color:rgb(0, 128, 255);
            }
            
            .link-btn:hover {
                color:rgb(9, 33, 69);
            }
            .navbar-brand img {
                filter: brightness(0) invert(1);
            }
            .bloc {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                margin-bottom: 20px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
        </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="../assets/bootstrap-icons/icons/building-fill.svg" alt="Logo" width="30" height="24" class="me-2">
                Emprunt
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'liste.php' ? 'active' : '' ?>" href="liste.php">Liste des objets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'filtre.php' ? 'active' : '' ?>" href="filtre.php">Filtre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'deconnexion.php' ? 'active' : '' ?>" href="login.php">Deconnexion</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
