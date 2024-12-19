<?php
session_start();
require_once '../Database.php';
require_once 'header.php';
require_once '../classes/Utilisateur.php';

global $pdo;
$database = new Database();
$pdo = $database->pdo;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des champs du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Vérification des champs vides
    if (empty($nom) || empty($password) || empty($email)) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        // Hashage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertion des données dans la table Utilisateurs
        $stmt = $pdo->prepare("INSERT INTO Utilisateurs(nom, password, email) VALUES (:nom, :password, :email)");
        $stmt->execute(['nom' => $nom, 'password' => $hashed_password, 'email' => $email]);
        
        $success = "Inscription réussie ! Vous pouvez vous connecter dès maintenant.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>

    <!-- Affichage des messages d'erreur ou de succès -->
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p style="color:green;"><?php echo $success; ?></p>
    <?php endif; ?>

    <form action="register.php" method="POST">
        <input type="text" name="nom" placeholder="Nom d'utilisateur" required><br>
        <input type="text" name="email" placeholder="email" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit">S'inscrire</button>
    </form>

    <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>
</body>
</html>
