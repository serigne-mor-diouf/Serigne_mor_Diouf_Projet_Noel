<!DOCTYPE html>
<html>
<head>
    <title>Modifier Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Modifier Rendez-vous</h1>
        
        <form action="/rendez-vous/update/<?= $rendezVous['id'] ?>" method="POST">
            <div class="form-group">
                <label>Client</label>
                <select name="client_id" class="form-control" required>
                    <?php foreach($clients as $client): ?>
                        <option value="<?= $client['id'] ?>" <?= ($client['id'] == $rendezVous['client_id']) ? 'selected' : '' ?>>
                            <?= $client['nom'] . ' ' . $client['prenom'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="<?= $rendezVous['date'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Heure</label>
                <input type="time" name="heure" class="form-control" value="<?= $rendezVous['heure'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" required><?= $rendezVous['description'] ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="/rendez-vous" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html> 