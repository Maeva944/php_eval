<?php  require('../Database.php');
    require_once('../classes/Livre.php');

    $Alllivre = new Livre;
    $livre = $Alllivre->getAllBooks();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de la Bibliothèque</title>
    <link rel="stylesheet" href="#">
    <script src="https://kit.fontawesome.com/6d66900dda.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <p><a href="register.php">Inscription</a> | <a href="login.php">Connexion</a></p>
    </header>
    <h1 class="text-center">Catalogue de la Bibliothèque</h1>
    <?php foreach ($livre as $livre): ?>
        <section>
            <h3><?= htmlspecialchars($livre['titre']) ?></h3>
            <p>Auteur : <?= htmlspecialchars($livre['auteur']) ?></p>
            <button>
                <i class="fa-regular fa-heart"></i>
            </button>
        </section>
    <?php endforeach ?>
</body>
</html>
