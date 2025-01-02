<?php
require_once(__DIR__ . "/../database.php");
require_once(__DIR__ . "/../models/Etudiant.php");

function indexEtudiant() {
    $etudiants = getAllEtudiants();
    require_once(__DIR__ . "/../views/etudiants/index.php");
}

function createEtudiant() {
    require_once(__DIR__ . "/../views/etudiants/create.php");
}

function storeEtudiant() {
    extract($_POST);
    $result = createEtudiantDB($nom, $prenom, $email, $filiere);
    
    if(isset($result['error'])) {
        // Stocker le message d'erreur dans la session
        session_start();
        $_SESSION['error'] = $result['error'];
        // Rediriger vers le formulaire avec les données
        $_SESSION['form_data'] = $_POST;
        header('location: etudiants.php?action=create');
        exit();
    }
    
    // Si tout va bien, rediriger vers la liste
    header('location: etudiants.php');
    exit();
}

function editEtudiant($id) {
    $result = getEtudiantById($id);
    $etudiant = mysqli_fetch_assoc($result);
    require_once(__DIR__ . "/../views/etudiants/edit.php");
}

function updateEtudiant() {
    extract($_POST);
    updateEtudiantDB($nom, $prenom, $email, $filiere, $id);
    header('location: etudiants.php');
}

function removeEtudiant($id) {
    deleteEtudiantDB($id);
    header('location: etudiants.php');
} 