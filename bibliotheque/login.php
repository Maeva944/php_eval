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
            //Récupération des informations des utilisateurs$

            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            //Vérification du mot de passe
            if($user && password_verify($password, $user['password'])){
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit();
            }else{
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

    <h1>Connexion</h1>
    <?php if (isset($error)) echo "<p style='color:red;>$error</p>" ?>
    <?php if (isset($success)) echo "<p style='color:green;>$success</p>" ?>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>

    </form>
    <p>Vous n'avez pas encore de comtpe ? <a href="register.php">S'inscrire</a></p>
</body>
</html>
