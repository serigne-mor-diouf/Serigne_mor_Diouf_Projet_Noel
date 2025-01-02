<?php
require_once('../../app/init.php');

// Récupérer les statistiques
$total_clients = count($clientModel->findAll());
$total_rdv = count($rendezVousModel->findAll());
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tableau de bord</h2>
        <div class="btn-group">
            <button class="btn btn-primary" data-action="create-client">
                <i class="fas fa-user-plus"></i> Nouveau Client
            </button>
            <button class="btn btn-success" data-action="create-rdv">
                <i class="fas fa-calendar-plus"></i> Nouveau RDV
            </button>
        </div>
    </div>

    <!-- Cartes statistiques et contenu du tableau de bord -->
    <!-- ... le reste du contenu du tableau de bord ... -->
</div> 