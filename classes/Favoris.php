<?php
require_once '../Database.php'; 

class Favoris {
    private $pdo;
    private $userId;

    public function __construct($userId) {
        global $pdo; 
        $this->pdo = $pdo;
        $this->userId = $userId;
    }

    
    public function getFavoris() {
        $stmt = $this->pdo->prepare("SELECT * FROM favoris WHERE user_id = ?");
        $stmt->execute([$this->userId]);
        return $stmt->fetchAll();
    }

    
    public function addFavori($favoriteName) {
        $stmt = $this->pdo->prepare("INSERT INTO favoris (utilisateur_id, nom) VALUES (?, ?)");
        $stmt->execute([$this->userId, $favoriteName]);
    }

    
    public function removeFavori($favoriteId) {
        $stmt = $this->pdo->prepare("DELETE FROM favoris WHERE id = ? AND utilisateur_id = ?");
        $stmt->execute([$favoriteId, $this->userId]);
    }
}
?>