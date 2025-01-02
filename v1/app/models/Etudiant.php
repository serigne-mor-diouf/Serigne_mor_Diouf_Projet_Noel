<?php
require_once(__DIR__ . "/../database.php");

function createEtudiantDB($nom, $prenom, $email, $filiere) {
    global $connexion;
    
    // Vérifier si l'email existe déjà
    $check_email = mysqli_query($connexion, "SELECT id FROM etudiants WHERE email = '$email'");
    if(mysqli_num_rows($check_email) > 0) {
        return ['error' => 'Cet email existe déjà !'];
    }
    
    $sql = "INSERT INTO etudiants (nom, prenom, email, filiere) 
            VALUES ('$nom', '$prenom', '$email', '$filiere')";
    
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

function getAllEtudiants() {
    global $connexion;
    $sql = "SELECT * FROM etudiants";
    return mysqli_query($connexion, $sql);
}

function deleteEtudiantDB($id) {
    global $connexion;
    $sql = "DELETE FROM etudiants WHERE id = $id";
    return mysqli_query($connexion, $sql);
}

function updateEtudiantDB($nom, $prenom, $email, $filiere, $id) {
    global $connexion;
    $sql = "UPDATE etudiants SET nom='$nom', prenom='$prenom', 
            email='$email', filiere='$filiere' WHERE id = $id";
    return mysqli_query($connexion, $sql);
}

function getEtudiantById($id) {
    global $connexion;
    $sql = "SELECT * FROM etudiants WHERE id = $id";
    return mysqli_query($connexion, $sql);
} 