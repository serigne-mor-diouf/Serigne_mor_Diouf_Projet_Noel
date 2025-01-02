<?php require_once(__DIR__ . "/../layout/header.php"); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-user-plus"></i> Ajouter un étudiant</h3>
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
                    
                    $form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
                    unset($_SESSION['form_data']);
                    ?>

                    <form action="?action=store" method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" 
                                   value="<?php echo isset($form_data['nom']) ? $form_data['nom'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom" 
                                   value="<?php echo isset($form_data['prenom']) ? $form_data['prenom'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" 
                                   value="<?php echo isset($form_data['email']) ? $form_data['email'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Filière</label>
                            <input type="text" class="form-control" name="filiere" 
                                   value="<?php echo isset($form_data['filiere']) ? $form_data['filiere'] : ''; ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="etudiants.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/../layout/footer.php"); ?> 