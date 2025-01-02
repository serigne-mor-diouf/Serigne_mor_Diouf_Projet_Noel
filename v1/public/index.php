<?php
require_once(__DIR__ . "/../app/controllers/EtudiantController.php");
require_once(__DIR__ . "/../app/controllers/CoursController.php");

// Obtenir les statistiques
$total_etudiants = mysqli_num_rows(getAllEtudiants());
$total_cours = mysqli_num_rows(getAllCours());

require_once(__DIR__ . "/../app/views/layout/header.php");
?>

<div class="container-fluid">
    <h2 class="mb-4">Tableau de bord</h2>
    
    <!-- Cartes statistiques -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total Étudiants</h6>
                            <h2 class="mb-0"><?php echo $total_etudiants; ?></h2>
                        </div>
                        <i class="fas fa-user-graduate fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-primary-dark">
                    <a href="etudiants.php" class="text-white text-decoration-none">
                        Voir détails <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total Cours</h6>
                            <h2 class="mb-0"><?php echo $total_cours; ?></h2>
                        </div>
                        <i class="fas fa-book fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="card-footer bg-success-dark">
                    <a href="cours.php" class="text-white text-decoration-none">
                        Voir détails <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Actions rapides</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="etudiants.php?action=create" class="btn btn-primary w-100">
                                <i class="fas fa-user-plus"></i> Nouvel étudiant
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="cours.php?action=create" class="btn btn-success w-100">
                                <i class="fas fa-plus-circle"></i> Nouveau cours
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/../app/views/layout/footer.php"); ?> 