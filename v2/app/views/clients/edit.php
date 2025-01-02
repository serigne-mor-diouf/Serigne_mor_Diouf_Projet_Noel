<!DOCTYPE html>
<html>
<head>
    <title>Modifier Client</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Modifier Client</h1>
        
        <form action="/clients/update/<?= $client['id'] ?>" method="POST">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" value="<?= $client['nom'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" class="form-control" value="<?= $client['prenom'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $client['email'] ?>" required>
            </div>
            
            <div class="form-group">
                <label>Téléphone</label>
                <input type="tel" name="telephone" class="form-control" value="<?= $client['telephone'] ?>" required>
            </div>
            
            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="/clients" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html> 