<?php
$title_page = isset($title_page) ? $title_page : "Mon épicerie en ligne";
$couleur_fond = "#ffffff";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?= $title_page ?> </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body style="background-color: <?= $couleur_fond; ?>;">
    <div class="touteLapage">
        <header>
            <h1>Mon épicerie en ligne</h1>
            <nav>
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="cart_view.php"><i class="fas fa-shopping-cart"></i> Mon panier</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h2><?= isset($title) ? $title : "" ?></h2>
            <?= isset($content) ? $content : "" ?>


        </main>

        <footer>
            <p>Ngaba Uhrweiller Jorel</p>
            <p>Tous droits réservés © cchic.ca</p>
        </footer>
    </div>
</body>
</html>
