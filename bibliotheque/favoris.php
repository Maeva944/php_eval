<?php
require_once 'header.php';
require_once '../classes/Favoris.php';
require_once '../database.php';

session_start();

if (!isset($_SESSION['nom'])) {
    echo "Vous devez d'abord vous connecter.";
    exit(); 
}

$userId = $_SESSION['id']; 
$favoris = new Favoris($pdo, $userId); 

$livres = $favoris->getFavoris(); 

foreach ($livres as $livre): ?>
    <h3><?= htmlspecialchars($livre['titre']) ?></h3>
    <p>Auteur : <?= htmlspecialchars($livre['auteur']) ?></p>
    <form method="post">
        <input type="hidden" name="livre_id" value="<?= $livre['id'] ?>">
        <button type="submit" name="remove_favori" class="btn-favori">
            Retirer des favoris <i class="fa fa-heart"></i>
        </button>
    </form>
<?php endforeach; ?>
