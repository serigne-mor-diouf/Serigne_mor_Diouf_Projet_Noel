<?php
session_start();

define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', '/Serigne_mor_Diouf_Projet_Noel/v2/public');

require_once(BASE_PATH . '/app/database.php');
require_once(BASE_PATH . '/app/models/Model.php');
require_once(BASE_PATH . '/app/models/Client.php');
require_once(BASE_PATH . '/app/controllers/ClientController.php');

$clientController = new ClientController();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch($action) {
    case 'create':
        $clientController->create();
        break;
    case 'store':
        $clientController->store();
        break;
    case 'edit':
        $clientController->edit($id);
        break;
    case 'update':
        $clientController->update($id);
        break;
    case 'show':
        $clientController->show($id);
        break;
    case 'destroy':
        $clientController->destroy($id);
        break;
    default:
        $clientController->index();
        break;
} 