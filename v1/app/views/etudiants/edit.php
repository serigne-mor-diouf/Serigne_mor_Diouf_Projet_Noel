<?php require_once(__DIR__ . "/../layout/header.php"); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-title mb-0"><i class="fas fa-user-edit"></i> Modifier l'étudiant</h3>
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
                        <input type="hidden" name="id" value="<?php echo $etudiant['id']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" 
                                   value="<?php echo $etudiant['nom']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom" 
                                   value="<?php echo $etudiant['prenom']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" 
                                   value="<?php echo $etudiant['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Filière</label>
                            <input type="text" class="form-control" name="filiere" 
                                   value="<?php echo $etudiant['filiere']; ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="etudiants.php" class="btn btn-secondary">
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