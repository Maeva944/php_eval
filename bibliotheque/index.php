<?php  require('../Database.php');
    require_once('../classes/Livre.php');

    $Alllivre = new Livre;
    $livre = $Alllivre->getAllBooks();

    require_once('header.php')
?>

<body>
    
    <h1 class="text-center">Catalogue de la Bibliothèque</h1>
    <?php foreach ($livre as $livre): ?>
        <section>
            <h3><?= htmlspecialchars($livre['titre']) ?></h3>
            <p>Auteur : <?= htmlspecialchars($livre['auteur']) ?></p>
            <form action="favoris.php" method="POST">
            <input type="hidden" name="livre_id" value="<?= $livre['id'] ?>">
            <button type="submit" name="add_favori" class="btn-favori">
                <i class="fa fa-heart"></i> Ajouter aux favoris
            </button>
            </form>
        </section>
    <?php endforeach ?>
</body>
</html>
