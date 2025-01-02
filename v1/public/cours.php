<?php
require_once(__DIR__ . "/../app/controllers/CoursController.php");

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($action) {
    case 'index':
        indexCours();
        break;
    case 'create':
        createCours();
        break;
    case 'store':
        storeCours();
        break;
    case 'edit':
        editCours($_GET['id']);
        break;
    case 'update':
        updateCours();
        break;
    case 'remove':
        removeCours($_GET['id']);
        break;
    default:
        indexCours();
} 