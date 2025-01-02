<?php
class RendezVous extends Model {
    protected $table = 'rendez_vous';
    private $id;
    private $date;
    private $heure;
    private $description;
    private $client_id;
    
    // Getters
    public function getId() { return $this->id; }
    public function getDate() { return $this->date; }
    public function getHeure() { return $this->heure; }
    public function getDescription() { return $this->description; }
    public function getClientId() { return $this->client_id; }
    
    // Setters
    public function setId($id) { $this->id = $id; }
    public function setDate($date) { $this->date = $date; }
    public function setHeure($heure) { $this->heure = $heure; }
    public function setDescription($description) { $this->description = $description; }
    public function setClientId($client_id) { $this->client_id = $client_id; }
    
    public function create($data) {
        $query = "INSERT INTO rendez_vous (date, heure, description, client_id) 
                 VALUES (:date, :heure, :description, :client_id)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'date' => $data['date'],
            'heure' => $data['heure'],
            'description' => $data['description'],
            'client_id' => $data['client_id']
        ]);
    }
    
    public function update($id, $data) {
        $query = "UPDATE rendez_vous 
                 SET date = :date, heure = :heure, description = :description, client_id = :client_id 
                 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'id' => $id,
            'date' => $data['date'],
            'heure' => $data['heure'],
            'description' => $data['description'],
            'client_id' => $data['client_id']
        ]);
    }
    
    // Méthode pour récupérer les rendez-vous avec les informations du client
    public function findWithClient($id) {
        $query = "SELECT rv.*, c.nom, c.prenom 
                 FROM rendez_vous rv 
                 JOIN clients c ON rv.client_id = c.id 
                 WHERE rv.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    /**
     * Récupère les détails d'un rendez-vous avec les informations du client
     * @param int $id
     * @return array
     */
    public function getRendezVousDetails($id) {
        $query = "SELECT rv.*, c.nom, c.prenom, c.email, c.telephone 
                 FROM rendez_vous rv 
                 JOIN clients c ON rv.client_id = c.id 
                 WHERE rv.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    /**
     * Vérifie si un créneau horaire est disponible
     * @param string $date
     * @param string $heure
     * @param int $exclude_id ID du rendez-vous à exclure (pour la modification)
     * @return bool
     */
    public function isCreneauDisponible($date, $heure, $exclude_id = null) {
        $query = "SELECT COUNT(*) FROM rendez_vous 
                 WHERE date = :date AND heure = :heure";
        $params = ['date' => $date, 'heure' => $heure];
        
        if ($exclude_id) {
            $query .= " AND id != :exclude_id";
            $params['exclude_id'] = $exclude_id;
        }
        
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchColumn() == 0;
    }
}
?> 