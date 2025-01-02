<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Nouveau Rendez-vous</h3>
                <a href="<?= BASE_URL ?>/rendez-vous.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL ?>/rendez-vous.php?action=store" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="client_id" class="form-label">Client</label>
                        <select class="form-select" id="client_id" name="client_id" required>
                            <option value="">Sélectionner un client</option>
                            <?php foreach($clients as $client): ?>
                                <option value="<?= $client['id'] ?>">
                                    <?= $client['nom'] . ' ' . $client['prenom'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="heure" class="form-label">Heure</label>
                        <input type="time" class="form-control" id="heure" name="heure" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 