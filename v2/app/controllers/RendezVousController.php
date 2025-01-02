<?php
require_once("../app/models/RendezVous.php");

class RendezVousController {
    private $rendezVousModel;
    private $clientModel;

    public function __construct() {
        $this->rendezVousModel = new RendezVous();
        $this->clientModel = new Client();
    }

    /**
     * Récupère tous les rendez-vous
     */
    public function getAllRendezVous() {
        return $this->rendezVousModel->findAll();
    }

    /**
     * Affiche la liste des rendez-vous
     */
    public function index() {
        $pageTitle = "Liste des Rendez-vous";
        $rendezVous = $this->rendezVousModel->findAll();
        $clients = $this->clientModel->findAll();
        
        require_once(BASE_PATH . '/app/views/layout/header.php');
        require_once(BASE_PATH . '/app/views/rendez-vous/index.php');
        require_once(BASE_PATH . '/app/views/layout/footer.php');
    }

    /**
     * Affiche le formulaire de création d'un rendez-vous
     */
    public function create() {
        if (isset($_GET['ajax'])) {
            $clients = $this->clientModel->findAll();
            require_once(BASE_PATH . '/app/views/rendez-vous/create_modal.php');
            exit;
        }
    }

    /**
     * Enregistre un nouveau rendez-vous
     */
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'client_id' => $_POST['client_id'],
                'date' => $_POST['date'],
                'heure' => $_POST['heure'],
                'description' => $_POST['description']
            ];

            $success = $this->rendezVousModel->create($data);
            
            if (isset($_GET['ajax'])) {
                echo json_encode(['success' => $success]);
                exit;
            }
        }
    }

    /**
     * Affiche les détails d'un rendez-vous
     * @param int $id
     */
    public function show($id) {
        if (isset($_GET['ajax'])) {
            $rdv = $this->rendezVousModel->findById($id);
            $client = $this->clientModel->findById($rdv['client_id']);
            require_once(BASE_PATH . '/app/views/rendez-vous/show_modal.php');
            exit;
        }
    }

    /**
     * Affiche le formulaire d'édition d'un rendez-vous
     * @param int $id Identifiant du rendez-vous
     */
    public function edit($id) {
        if (isset($_GET['ajax'])) {
            $rdv = $this->rendezVousModel->findById($id);
            $clients = $this->clientModel->findAll();
            require_once(BASE_PATH . '/app/views/rendez-vous/edit_modal.php');
            exit;
        }
    }

    /**
     * Vérifie la disponibilité avant création/modification
     */
    private function validateCreneau($date, $heure, $id = null) {
        if (!$this->rendezVousModel->isCreneauDisponible($date, $heure, $id)) {
            // Créneau déjà pris
            return false;
        }
        return true;
    }

    /**
     * Mise à jour avec validation du créneau
     */
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'client_id' => $_POST['client_id'],
                'date' => $_POST['date'],
                'heure' => $_POST['heure'],
                'description' => $_POST['description']
            ];

            $success = $this->rendezVousModel->update($id, $data);
            
            if (isset($_GET['ajax'])) {
                echo json_encode(['success' => $success]);
                exit;
            }
        }
    }

    /**
     * Supprime un rendez-vous
     * @param int $id Identifiant du rendez-vous
     */
    public function destroy($id) {
        $success = $this->rendezVousModel->delete($id);
        
        if (isset($_GET['ajax'])) {
            echo json_encode(['success' => $success]);
            exit;
        }
    }

    /**
     * Affiche les rendez-vous d'un client spécifique
     * @param int $clientId Identifiant du client
     */
    public function getRendezVousByClient($clientId) {
        $rendezVous = $this->rendezVousModel->findByClientId($clientId);
        require_once("../app/views/rendezvous/client-rendezvous.php");
    }
}
?> 