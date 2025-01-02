<?php require_once(__DIR__ . "/../layout/header.php"); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-book"></i> Liste des cours</h2>
        <a href="?action=create" class="btn btn-success">
            <i class="fas fa-plus"></i> Ajouter un cours
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
                            <th>Code</th>
                            <th>Nom du cours</th>
                            <th>Nombre d'heures</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if($cours && mysqli_num_rows($cours) > 0) {
                            while($row = mysqli_fetch_assoc($cours)) { ?>
                                <tr>
                                    <td><?php echo $row['code_cours']; ?></td>
                                    <td><?php echo $row['nom_cours']; ?></td>
                                    <td><?php echo $row['nombre_heures']; ?></td>
                                    <td>
                                        <a href="?action=edit&id=<?php echo $row['id']; ?>" 
                                           class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?action=remove&id=<?php echo $row['id']; ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Êtes-vous sûr ?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="4" class="text-center">Aucun cours trouvé</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/../layout/footer.php"); ?> 