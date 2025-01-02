<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-center mb-0">Liste des Clients</h3>
                <a href="<?= BASE_URL ?>/clients.php?action=create" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clientModal" onclick="loadCreateForm()">
                    <i class="fas fa-plus"></i> Nouveau Client
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($clients as $client): ?>
                        <tr>
                            <td><?= $client['id'] ?></td>
                            <td><?= $client['nom'] ?></td>
                            <td><?= $client['prenom'] ?></td>
                            <td><?= $client['email'] ?></td>
                            <td><?= $client['telephone'] ?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal" onclick="loadDetails(<?= $client['id'] ?>)">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#clientModal" onclick="loadEditForm(<?= $client['id'] ?>)">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $client['id'] ?>)">
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
                <h5 class="modal-title">Détails du Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>

<!-- Modal pour création/édition -->
<div class="modal fade" id="clientModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Client</h5>
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
    fetch(`<?= BASE_URL ?>/clients.php?action=create&ajax=true`)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#clientModal .modal-title').textContent = 'Nouveau Client';
            document.querySelector('#clientModal .modal-body').innerHTML = html;
        });
}

// Charger les détails d'un client
function loadDetails(id) {
    fetch(`<?= BASE_URL ?>/clients.php?action=show&id=${id}&ajax=true`)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#detailsModal .modal-body').innerHTML = html;
        });
}

// Charger le formulaire d'édition
function loadEditForm(id) {
    fetch(`<?= BASE_URL ?>/clients.php?action=edit&id=${id}&ajax=true`)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#clientModal .modal-title').textContent = 'Modifier Client';
            document.querySelector('#clientModal .modal-body').innerHTML = html;
        });
}

// Confirmation de suppression
function confirmDelete(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce client ?')) {
        fetch(`<?= BASE_URL ?>/clients.php?action=delete&id=${id}`)
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