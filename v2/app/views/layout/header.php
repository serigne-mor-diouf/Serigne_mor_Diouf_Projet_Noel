<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : 'Gestion des Rendez-vous' ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #2c3e50;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background: #34495e;
            transform: translateX(10px);
        }
        .sidebar a.active {
            background: #34495e;
            border-left: 4px solid #3498db;
        }
        .main-content {
            min-height: 100vh;
            background: #f8f9fa;
        }
        .sidebar .logo {
            padding: 20px;
            text-align: center;
            color: white;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="logo">
                    <i class="fas fa-calendar-alt fa-2x mb-2"></i>
                    <h4>Gestion RDV</h4>
                </div>
                <div class="d-flex flex-column">
                    <a href="<?= BASE_URL ?>" class="<?= $pageTitle == 'Tableau de bord' ? 'active' : '' ?>">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                    <a href="<?= BASE_URL ?>/clients.php" class="<?= strpos($pageTitle, 'Client') !== false ? 'active' : '' ?>">
                        <i class="fas fa-users"></i> Clients
                    </a>
                    <a href="<?= BASE_URL ?>/rendez-vous.php" class="<?= strpos($pageTitle, 'Rendez-vous') !== false ? 'active' : '' ?>">
                        <i class="fas fa-calendar-check"></i> Rendez-vous
                    </a>
                    <div class="mt-auto p-3">
                        <a href="#" class="text-danger">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 main-content p-4">
                <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?? 'info' ?> alert-dismissible fade show">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php 
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                    ?>
                <?php endif; ?> 