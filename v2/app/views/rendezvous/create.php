<!DOCTYPE html>
<html>
<head>
    <title>Nouveau Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Nouveau Rendez-vous</h1>
        
        <form action="/rendez-vous/store" method="POST">
            <div class="form-group">
                <label>Client</label>
                <select name="client_id" class="form-control" required>
                    <option value="">Sélectionnez un client</option>
                    <?php foreach($clients as $client): ?>
                        <option value="<?= $client['id'] ?>">
                            <?= $client['nom'] . ' ' . $client['prenom'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Heure</label>
                <input type="time" name="heure" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="/rendez-vous" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html> 