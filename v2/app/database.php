<?php
class Database {
    private static $instance = null;
    private $connexion;
    
    private $serveur = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "gestion_universitaire";
    
    private function __construct() {
        try {
            $this->connexion = new PDO(
                "mysql:host={$this->serveur};dbname={$this->dbname};charset=utf8",
                $this->user,
                $this->pwd
            );
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connexion;
    }
}
?>