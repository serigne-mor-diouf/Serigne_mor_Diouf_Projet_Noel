<form action="<?= BASE_URL ?>/rendez-vous.php?action=update&id=<?= $rdv['id'] ?>&ajax=true" method="POST">
    <div class="mb-3">
        <label for="client_id" class="form-label">Client</label>
        <select class="form-select" id="client_id" name="client_id" required>
            <?php foreach($clients as $client): ?>
                <option value="<?= $client['id'] ?>" <?= $rdv['client_id'] == $client['id'] ? 'selected' : '' ?>>
                    <?= $client['nom'] . ' ' . $client['prenom'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" id="date" name="date" value="<?= $rdv['date'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="heure" class="form-label">Heure</label>
        <input type="time" class="form-control" id="heure" name="heure" value="<?= $rdv['heure'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required><?= $rdv['description'] ?></textarea>
    </div>
    <div class="text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </div>
</form> 