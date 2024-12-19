<?php
    session_start();
    require_once '../Database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Récupération des champs du formulaire
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        //Vérification des champs vides
        if( empty($username) || empty($password)){
            $error = "Veuillez remplir tous les champs.";
        }else{
            //hashage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
            //Préparation et exécution de la requête SQL
            $stmt = $pdo->prepare("INSERT INTO users(username, password) VALUES (:username, :password)");
            $stmt->execute(['username' => $username, 'password' => $hashed_password]);
            $succes = "Inscription réussie ! Vous pouvez vous connecter."; 
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Inscription</h1>
    <?php if (isset($error)) echo "<p style='color:red';>$error</p>" ?>
    <?php if (isset($succes)) echo "<p style='color:green';>$succes</p>" ?>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">S'inscrire</button>

    </form>

    <p>Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>
</body>
</html>