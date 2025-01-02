<!DOCTYPE html>
<html>
<head>
    <title>Détails du Client</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Détails du Client</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $client['nom'] . ' ' . $client['prenom'] ?></h5>
                <p class="card-text">
                    <strong>Email:</strong> <?= $client['email'] ?><br>
                    <strong>Téléphone:</strong> <?= $client['telephone'] ?>
                </p>
                
                <h6 class="mt-4">Rendez-vous du client</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rendezVous as $rdv): ?>
                        <tr>
                            <td><?= date('d/m/Y', strtotime($rdv['date'])) ?></td>
                            <td><?= $rdv['heure'] ?></td>
                            <td><?= $rdv['description'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="/clients/edit/<?= $client['id'] ?>" class="btn btn-warning">Modifier</a>
            <a href="/clients" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</body>
</html> 