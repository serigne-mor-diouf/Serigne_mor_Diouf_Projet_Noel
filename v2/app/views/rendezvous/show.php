<!DOCTYPE html>
<html>
<head>
    <title>Détails du Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Détails du Rendez-vous</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rendez-vous du <?= date('d/m/Y', strtotime($rendezVous['date'])) ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">à <?= $rendezVous['heure'] ?></h6>
                
                <div class="mt-3">
                    <strong>Client:</strong> 
                    <a href="/clients/show/<?= $rendezVous['client_id'] ?>">
                        <?= $rendezVous['nom'] . ' ' . $rendezVous['prenom'] ?>
                    </a>
                </div>
                
                <div class="mt-3">
                    <strong>Description:</strong>
                    <p class="card-text"><?= $rendezVous['description'] ?></p>
                </div>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="/rendez-vous/edit/<?= $rendezVous['id'] ?>" class="btn btn-warning">Modifier</a>
            <a href="/rendez-vous" class="btn btn-secondary">Retour</a>
            <a href="/rendez-vous/destroy/<?= $rendezVous['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
        </div>
    </div>
</body>
</html> 