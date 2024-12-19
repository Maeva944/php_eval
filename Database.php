<?php

Class Database{
    private $host = 'localhost';
    private $dbname = 'bibliotheque';
    private $user = 'root';
    private $password = '';
    private $charset = 'utf8mb4';
    public $pdo;

    public function __construct(){
        $dsn = "mysql:host={$this->host}; dbname={$this->dbname}; charset={$this->charset}";
        try {
            
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }


}