<?php

require_once('../Database.php');

class Livre{
    private $id;
    private $auteur;
    private $titre;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllBooks() {
        $query = "SELECT * FROM livres";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


