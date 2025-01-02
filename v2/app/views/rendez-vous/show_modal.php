<div class="card">
    <div class="card-body">
        <h5 class="card-title">Rendez-vous #<?= $rdv['id'] ?></h5>
        <p class="card-text">
            <strong>Client:</strong> <?= $client['nom'] . ' ' . $client['prenom'] ?><br>
            <strong>Date:</strong> <?= date('d/m/Y', strtotime($rdv['date'])) ?><br>
            <strong>Heure:</strong> <?= $rdv['heure'] ?><br>
            <strong>Description:</strong><br>
            <?= nl2br($rdv['description']) ?>
        </p>
    </div>
</div> 