<?php
class Database {
    private $serveur = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "gestion_universitaire";

    public function getConnection() {
        try {
            $connexion = new PDO("mysql:host=$this->serveur;dbname=$this->dbname", $this->user, $this->pwd);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connexion;
        } catch(PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
} 