<?php
session_start();

// Définir les chemins
define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', '/Serigne_mor_Diouf_Projet_Noel/v2/public');

// Inclure les fichiers nécessaires
require_once(BASE_PATH . '/app/database.php');
require_once(BASE_PATH . '/app/models/Model.php');
require_once(BASE_PATH . '/app/models/Client.php');
require_once(BASE_PATH . '/app/models/RendezVous.php');
require_once(BASE_PATH . '/app/controllers/ClientController.php');
require_once(BASE_PATH . '/app/controllers/RendezVousController.php');

// Initialiser les contrôleurs et modèles
$clientController = new ClientController();
$rendezVousController = new RendezVousController();
$clientModel = new Client();
$rendezVousModel = new RendezVous();

// Obtenir les statistiques
$total_clients = count($clientModel->findAll());
$total_rdv = count($rendezVousModel->findAll());

// Définir le titre de la page
$pageTitle = "Tableau de bord";

// Inclure le header
require_once(BASE_PATH . '/app/views/layout/header.php');
?>

<div class="container-fluid">
    <!-- En-tête du tableau de bord -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tableau de bord</h2>
    </div>
    
    <!-- Cartes statistiques -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total Clients</h6>
                            <h2 class="mb-0"><?php echo $total_clients; ?></h2>
                        </div>
                        <i class="fas fa-users fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= BASE_URL ?>/clients.php" class="text-white text-decoration-none">
                        Voir détails <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total Rendez-vous</h6>
                            <h2 class="mb-0"><?php echo $total_rdv; ?></h2>
                        </div>
                        <i class="fas fa-calendar-check fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= BASE_URL ?>/rendez-vous.php" class="text-white text-decoration-none">
                        Voir détails <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Derniers rendez-vous -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Derniers rendez-vous</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $derniers_rdv = $rendezVousModel->findAll(5); // Récupérer les 5 derniers RDV
                        foreach($derniers_rdv as $rdv): 
                            $client = $clientModel->findById($rdv['client_id']);
                        ?>
                        <tr>
                            <td><?= date('d/m/Y H:i', strtotime($rdv['date'] . ' ' . $rdv['heure'])) ?></td>
                            <td><?= $client['nom'] . ' ' . $client['prenom'] ?></td>
                            <td><?= substr($rdv['description'], 0, 50) ?>...</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal" onclick="loadRdvDetails(<?= $rdv['id'] ?>)">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal pour les détails du rendez-vous -->
    <div class="modal fade" id="detailsModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Détails du Rendez-vous</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Le contenu sera chargé dynamiquement -->
                </div>
            </div>
        </div>
    </div>

    <script>
    // Fonction pour charger les détails d'un rendez-vous
    function loadRdvDetails(id) {
        fetch(`<?= BASE_URL ?>/rendez-vous.php?action=show&id=${id}&ajax=true`)
            .then(response => response.text())
            .then(html => {
                document.querySelector('#detailsModal .modal-body').innerHTML = html;
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors du chargement des détails');
            });
    }
    </script>
</div>

<?php require_once(BASE_PATH . '/app/views/layout/footer.php'); ?> 