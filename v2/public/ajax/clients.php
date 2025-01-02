<?php
require_once('../../app/init.php');

$clients = $clientModel->findAll();
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestion des Clients</h2>
        <button class="btn btn-primary" data-action="create-client">
            <i class="fas fa-user-plus"></i> Nouveau Client
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <!-- Table des clients -->
                <!-- ... -->
            </div>
        </div>
    </div>
</div> 