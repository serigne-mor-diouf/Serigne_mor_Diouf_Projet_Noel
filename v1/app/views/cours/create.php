<?php require_once(__DIR__ . "/../layout/header.php"); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-book-medical"></i> Ajouter un cours</h3>
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
                            <label class="form-label">Nom du cours</label>
                            <input type="text" class="form-control" name="nom_cours" 
                                   value="<?php echo isset($form_data['nom_cours']) ? $form_data['nom_cours'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code du cours</label>
                            <input type="text" class="form-control" name="code_cours" 
                                   value="<?php echo isset($form_data['code_cours']) ? $form_data['code_cours'] : ''; ?>" required>
                            <div class="form-text">Ex: INFO123, MATH101, etc.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre d'heures</label>
                            <input type="number" class="form-control" name="nombre_heures" 
                                   value="<?php echo isset($form_data['nombre_heures']) ? $form_data['nombre_heures'] : ''; ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="cours.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-success">
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