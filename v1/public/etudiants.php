<?php
require_once(__DIR__ . "/../app/controllers/EtudiantController.php");

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($action) {
    case 'index':
        indexEtudiant();
        break;
    case 'create':
        createEtudiant();
        break;
    case 'store':
        storeEtudiant();
        break;
    case 'edit':
        editEtudiant($_GET['id']);
        break;
    case 'update':
        updateEtudiant();
        break;
    case 'remove':
        removeEtudiant($_GET['id']);
        break;
    default:
        indexEtudiant();
} 