<?php
require_once(__DIR__ . "/../database.php");

function createCoursDB($nom_cours, $code_cours, $nombre_heures) {
    global $connexion;
    
    // Vérifier si le code du cours existe déjà
    $check_code = mysqli_query($connexion, "SELECT id FROM cours WHERE code_cours = '$code_cours'");
    if(mysqli_num_rows($check_code) > 0) {
        return ['error' => 'Ce code de cours existe déjà !'];
    }
    
    $sql = "INSERT INTO cours (nom_cours, code_cours, nombre_heures) 
            VALUES ('$nom_cours', '$code_cours', $nombre_heures)";
    
    try {
        $result = mysqli_query($connexion, $sql);
        if($result) {
            return ['success' => true];
        } else {
            return ['error' => 'Erreur lors de l\'enregistrement'];
        }
    } catch(Exception $e) {
        return ['error' => 'Une erreur est survenue'];
    }
}

function getAllCours() {
    global $connexion;
    $sql = "SELECT * FROM cours";
    $result = mysqli_query($connexion, $sql);
    return $result; // Retourne directement le résultat mysqli
}

function deleteCoursDB($id) {
    global $connexion;
    $sql = "DELETE FROM cours WHERE id = $id";
    return mysqli_query($connexion, $sql);
}

function updateCoursDB($nom_cours, $code_cours, $nombre_heures, $id) {
    global $connexion;
    $sql = "UPDATE cours SET nom_cours='$nom_cours', code_cours='$code_cours', 
            nombre_heures=$nombre_heures WHERE id = $id";
    return mysqli_query($connexion, $sql);
}

function getCoursById($id) {
    global $connexion;
    $sql = "SELECT * FROM cours WHERE id = $id";
    return mysqli_query($connexion, $sql);
} 