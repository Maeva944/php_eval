<?php

require_once ('header.php');
session_start();
if(!isset($_SESSION['nom'])){
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur ton Dashboard </title>
</head>
<body>
    <h1>Bienvenue sur ton dashboard <?php echo $_SESSION['nom']?> !</h1>
    <p><a href="../logout.php">Déconnexion</a></p>

</body>
</html>


