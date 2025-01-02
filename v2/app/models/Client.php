<?php
class Client extends Model {
    protected $table = 'clients';
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    
    // Getters
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getEmail() { return $this->email; }
    public function getTelephone() { return $this->telephone; }
    
    // Setters
    public function setId($id) { $this->id = $id; }
    public function setNom($nom) { $this->nom = $nom; }
    public function setPrenom($prenom) { $this->prenom = $prenom; }
    public function setEmail($email) { $this->email = $email; }
    public function setTelephone($telephone) { $this->telephone = $telephone; }
    
    public function create($data) {
        $query = "INSERT INTO clients (nom, prenom, email, telephone) 
                 VALUES (:nom, :prenom, :email, :telephone)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'telephone' => $data['telephone']
        ]);
    }
    
    public function update($id, $data) {
        $query = "UPDATE clients 
                 SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone 
                 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'id' => $id,
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'telephone' => $data['telephone']
        ]);
    }

    /**
     * Récupère tous les rendez-vous d'un client
     * @param int $clientId
     * @return array
     */
    public function getRendezVousByClient($clientId) {
        $query = "SELECT rv.*, c.nom, c.prenom 
                 FROM rendez_vous rv 
                 JOIN clients c ON rv.client_id = c.id 
                 WHERE c.id = :client_id 
                 ORDER BY rv.date, rv.heure";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['client_id' => $clientId]);
        return $stmt->fetchAll();
    }

    /**
     * Récupère les détails complets d'un client avec ses rendez-vous
     * @param int $id
     * @return array
     */
    public function getClientDetails($id) {
        $client = $this->findById($id);
        if ($client) {
            $client['rendez_vous'] = $this->getRendezVousByClient($id);
        }
        return $client;
    }
}
?> 