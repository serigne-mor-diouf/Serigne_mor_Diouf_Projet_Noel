<?php

$serveur = "localhost";
$user = "root";        // Utilisateur par défaut de MySQL
$pwd = "";             // Mot de passe (vide par défaut en local)
$dbname = "gestion_universitaire";

// Création de la connexion avec mysqli
$connexion = mysqli_connect($serveur, $user, $pwd, $dbname);

// Vérification de la connexion
if (!$connexion) {
    die("Erreur de connexion: " . mysqli_connect_error());
} else {
    //echo "Connexion réussie";
}

// Définir l'encodage des caractères en UTF-8
mysqli_set_charset($connexion, "utf8"); 