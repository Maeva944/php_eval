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
            <button>
                <i class="fa-regular fa-heart"></i>
            </button>
        </section>
    <?php endforeach ?>
</body>
</html>
