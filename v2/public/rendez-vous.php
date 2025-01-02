<?php
session_start();

define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', '/Serigne_mor_Diouf_Projet_Noel/v2/public');

require_once(BASE_PATH . '/app/database.php');
require_once(BASE_PATH . '/app/models/Model.php');
require_once(BASE_PATH . '/app/models/RendezVous.php');
require_once(BASE_PATH . '/app/models/Client.php');
require_once(BASE_PATH . '/app/controllers/RendezVousController.php');

$rendezVousController = new RendezVousController();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch($action) {
    case 'create':
        $rendezVousController->create();
        break;
    case 'store':
        $rendezVousController->store();
        break;
    case 'edit':
        $rendezVousController->edit($id);
        break;
    case 'update':
        $rendezVousController->update($id);
        break;
    case 'show':
        $rendezVousController->show($id);
        break;
    case 'destroy':
        $rendezVousController->destroy($id);
        break;
    default:
        $rendezVousController->index();
        break;
} 