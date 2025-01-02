<?php require_once(__DIR__ . "/../layout/header.php"); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-title mb-0"><i class="fas fa-edit"></i> Modifier le cours</h3>
                </div>
                <div class="card-body">
                    <?php
                    session_start();
                    if(isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                ' . $_SESSION['error'] . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              </div>';
                        unset($_SESSION['error']);
                    }
                    ?>

                    <form action="?action=update" method="POST" class="needs-validation" novalidate>
                        <input type="hidden" name="id" value="<?php echo $cours['id']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Nom du cours</label>
                            <input type="text" class="form-control" name="nom_cours" 
                                   value="<?php echo $cours['nom_cours']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code du cours</label>
                            <input type="text" class="form-control" name="code_cours" 
                                   value="<?php echo $cours['code_cours']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre d'heures</label>
                            <input type="number" class="form-control" name="nombre_heures" 
                                   value="<?php echo $cours['nombre_heures']; ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="cours.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/../layout/footer.php"); ?> 