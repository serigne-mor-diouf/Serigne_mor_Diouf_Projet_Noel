<!DOCTYPE html>
<html>
<head>
    <title>Liste des Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Liste des Rendez-vous</h1>
        <a href="/rendez-vous/create" class="btn btn-primary mb-3">Nouveau Rendez-vous</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Client</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rendezVous as $rdv): ?>
                <tr>
                    <td><?= $rdv['id'] ?></td>
                    <td><?= date('d/m/Y', strtotime($rdv['date'])) ?></td>
                    <td><?= $rdv['heure'] ?></td>
                    <td><?= $rdv['nom'] . ' ' . $rdv['prenom'] ?></td>
                    <td><?= substr($rdv['description'], 0, 50) ?>...</td>
                    <td>
                        <a href="/rendez-vous/show/<?= $rdv['id'] ?>" class="btn btn-info btn-sm">Voir</a>
                        <a href="/rendez-vous/edit/<?= $rdv['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/rendez-vous/destroy/<?= $rdv['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html> 