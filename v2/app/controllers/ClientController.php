<?php
require_once("../app/models/Client.php");

class ClientController {
    private $clientModel;

    public function __construct() {
        $this->clientModel = new Client();
    }

    /**
     * Récupère tous les clients
     */
    public function getAllClients() {
        return $this->clientModel->findAll();
    }

    /**
     * Affiche la liste des clients
     */
    public function index() {
        $pageTitle = "Liste des Clients";
        $clients = $this->clientModel->findAll();
        
        require_once(BASE_PATH . '/app/views/layout/header.php');
        require_once(BASE_PATH . '/app/views/clients/index.php');
        require_once(BASE_PATH . '/app/views/layout/footer.php');
    }

    /**
     * Affiche le formulaire de création d'un client
     */
    public function create() {
        if (isset($_GET['ajax'])) {
            require_once(BASE_PATH . '/app/views/clients/create_modal.php');
            exit;
        }
        $pageTitle = "Nouveau Client";
        
        require_once(BASE_PATH . '/app/views/layout/header.php');
        require_once(BASE_PATH . '/app/views/clients/create.php');
        require_once(BASE_PATH . '/app/views/layout/footer.php');
    }

    /**
     * Enregistre un nouveau client dans la base de données
     */
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone']
            ];

            $success = $this->clientModel->create($data);
            
            if (isset($_GET['ajax'])) {
                echo json_encode(['success' => $success]);
                exit;
            }

            if ($success) {
                $_SESSION['message'] = "Client ajouté avec succès";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de l'ajout du client";
                $_SESSION['message_type'] = "danger";
            }

            header('Location: ' . BASE_URL . '/clients.php');
            exit();
        }
    }

    /**
     * Affiche les détails d'un client avec ses rendez-vous
     * @param int $id
     */
    public function show($id) {
        if (isset($_GET['ajax'])) {
            $client = $this->clientModel->findById($id);
            require_once(BASE_PATH . '/app/views/clients/show_modal.php');
            exit;
        }
        $client = $this->clientModel->getClientDetails($id);
        if (!$client) {
            // Gérer l'erreur - client non trouvé
            header('Location: /clients');
            exit();
        }
        require_once("../app/views/clients/show.php");
    }

    /**
     * Affiche le formulaire d'édition d'un client
     * @param int $id Identifiant du client
     */
    public function edit($id) {
        if (isset($_GET['ajax'])) {
            $client = $this->clientModel->findById($id);
            require_once(BASE_PATH . '/app/views/clients/edit_modal.php');
            exit;
        }
        $client = $this->clientModel->findById($id);
        require_once("../app/views/clients/edit.php");
    }

    /**
     * Met à jour les informations d'un client
     * @param int $id Identifiant du client
     */
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone']
            ];

            $success = $this->clientModel->update($id, $data);
            
            if (isset($_GET['ajax'])) {
                echo json_encode(['success' => $success]);
                exit;
            }

            if ($success) {
                $_SESSION['message'] = "Client modifié avec succès";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la modification";
                $_SESSION['message_type'] = "danger";
            }

            header('Location: ' . BASE_URL . '/clients.php');
            exit();
        }
    }

    /**
     * Supprime un client
     * @param int $id Identifiant du client
     */
    public function destroy($id) {
        $this->clientModel->delete($id);
        header('Location: /clients');
    }
}
?> 