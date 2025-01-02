<?php
require_once(__DIR__ . "/../database.php");
require_once(__DIR__ . "/../models/Cours.php");

function indexCours() {
    $cours = getAllCours();
    require_once(__DIR__ . "/../views/cours/index.php");
}

function createCours() {
    require_once(__DIR__ . "/../views/cours/create.php");
}

function storeCours() {
    extract($_POST);
    $result = createCoursDB($nom_cours, $code_cours, $nombre_heures);
    
    if(isset($result['error'])) {
        session_start();
        $_SESSION['error'] = $result['error'];
        $_SESSION['form_data'] = $_POST;
        header('location: cours.php?action=create');
        exit();
    }
    
    header('location: cours.php');
    exit();
}

function editCours($id) {
    $result = getCoursById($id);
    $cours = mysqli_fetch_assoc($result);
    require_once(__DIR__ . "/../views/cours/edit.php");
}

function updateCours() {
    extract($_POST);
    updateCoursDB($nom_cours, $code_cours, $nombre_heures, $id);
    header('location: cours.php');
}

function removeCours($id) {
    deleteCoursDB($id);
    header('location: cours.php');
} 