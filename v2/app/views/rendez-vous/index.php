<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-center mb-0">Liste des Rendez-vous</h3>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rdvModal" onclick="loadCreateForm()">
                    <i class="fas fa-plus"></i> Nouveau Rendez-vous
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Client</th>
                            <th>Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rendezVous as $rdv): 
                            $client = $this->clientModel->findById($rdv['client_id']);
                        ?>
                        <tr>
                            <td><?= date('d/m/Y', strtotime($rdv['date'])) ?></td>
                            <td><?= $rdv['heure'] ?></td>
                            <td><?= $client['nom'] . ' ' . $client['prenom'] ?></td>
                            <td><?= substr($rdv['description'], 0, 50) ?>...</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal" onclick="loadDetails(<?= $rdv['id'] ?>)">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#rdvModal" onclick="loadEditForm(<?= $rdv['id'] ?>)">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $rdv['id'] ?>)">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour les détails -->
<div class="modal fade" id="detailsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails du Rendez-vous</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>

<!-- Modal pour création/édition -->
<div class="modal fade" id="rdvModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rendez-vous</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Formulaire chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>

<script>
// Charger le formulaire de création
function loadCreateForm() {
    fetch(`<?= BASE_URL ?>/rendez-vous.php?action=create&ajax=true`)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#rdvModal .modal-title').textContent = 'Nouveau Rendez-vous';
            document.querySelector('#rdvModal .modal-body').innerHTML = html;
        });
}

// Charger les détails d'un rendez-vous
function loadDetails(id) {
    fetch(`<?= BASE_URL ?>/rendez-vous.php?action=show&id=${id}&ajax=true`)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#detailsModal .modal-body').innerHTML = html;
        });
}

// Charger le formulaire d'édition
function loadEditForm(id) {
    fetch(`<?= BASE_URL ?>/rendez-vous.php?action=edit&id=${id}&ajax=true`)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#rdvModal .modal-title').textContent = 'Modifier Rendez-vous';
            document.querySelector('#rdvModal .modal-body').innerHTML = html;
        });
}

// Confirmation de suppression
function confirmDelete(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?')) {
        fetch(`<?= BASE_URL ?>/rendez-vous.php?action=delete&id=${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Erreur lors de la suppression');
                }
            });
    }
}

// Gestion des formulaires dans les modales
document.addEventListener('submit', function(e) {
    const form = e.target.closest('.modal form');
    if (form) {
        e.preventDefault();
        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Une erreur est survenue');
            }
        });
    }
});
</script> 