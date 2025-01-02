<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Universitaire</title>
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
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .main-content {
            min-height: 100vh;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="d-flex flex-column p-3">
                    <h4 class="text-white mb-4">Menu</h4>
                    <a href="/Serigne_mor_Diouf_Projet_Noel/v1/public/index.php" class="p-2 mb-2">
                        <i class="fas fa-home me-2"></i> Accueil
                    </a>
                    <a href="/Serigne_mor_Diouf_Projet_Noel/v1/public/etudiants.php" class="p-2 mb-2">
                        <i class="fas fa-user-graduate me-2"></i> Étudiants
                    </a>
                    <a href="/Serigne_mor_Diouf_Projet_Noel/v1/public/cours.php" class="p-2">
                        <i class="fas fa-book me-2"></i> Cours
                    </a>
                </div>
            </div>
            <!-- Main Content -->
            <div class="col-md-10 main-content p-4"> 