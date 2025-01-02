<?php require_once(__DIR__ . "/../layout/header.php"); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-user-graduate"></i> Liste des étudiants</h2>
        <a href="?action=create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter un étudiant
        </a>
    </div>

    <?php
    session_start();
    if(isset($_SESSION['success'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                ' . $_SESSION['success'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
        unset($_SESSION['success']);
    }
    ?>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Filière</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($etudiant = mysqli_fetch_assoc($etudiants)) { ?>
                            <tr>
                                <td><?php echo $etudiant['id']; ?></td>
                                <td><?php echo $etudiant['nom']; ?></td>
                                <td><?php echo $etudiant['prenom']; ?></td>
                                <td><?php echo $etudiant['email']; ?></td>
                                <td><?php echo $etudiant['filiere']; ?></td>
                                <td>
                                    <a href="?action=edit&id=<?php echo $etudiant['id']; ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="?action=remove&id=<?php echo $etudiant['id']; ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/../layout/footer.php"); ?> 