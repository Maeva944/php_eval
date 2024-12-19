<?php

require_once '../Database.php';

class Utilisateur {
    
    public function seConnecter($username, $password) {
        global $pdo; 
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        
        if ($user && password_verify($password, $user['password'])) {
            return $user; 
        }
        echo "Mot de passe incorcte"; 
    }

    
    public function sInscrire($username, $email, $password) {
        global $pdo; 
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        ]);
    }
}
?>

