<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Récupérer l'instance de l'EntityManager et Twig
$container = require_once dirname(__DIR__) . '/app/config/bootstrap.php';
$entityManager = $container['entityManager'];
$twig = $container['twig'];

// Récupérer l'URL demandée
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Instancier les contrôleurs
$animalController = new \App\Controllers\AnimalController($entityManager, $twig);
$equipmentController = new \App\Controllers\EquipmentController($entityManager, $twig);

// Router simple
switch ($uri) {
    // Routes pour les équipements
    case '/':
    case '/equipment':
        $equipmentController->index();
        break;
    
    case '/equipment/create':
        $equipmentController->create();
        break;
    
    case '/equipment/store':
        $equipmentController->store();
        break;
    
    case (preg_match('/^\/equipment\/edit\/(\d+)$/', $uri, $matches) ? true : false):
        $equipmentController->edit($matches[1]);
        break;
    
    case (preg_match('/^\/equipment\/update\/(\d+)$/', $uri, $matches) ? true : false):
        $equipmentController->update($matches[1]);
        break;
    
    case (preg_match('/^\/equipment\/delete\/(\d+)$/', $uri, $matches) ? true : false):
        $equipmentController->delete($matches[1]);
        break;

    // Routes pour les animaux
    case '/animal':
        $animalController->index();
        break;
    
    case '/animal/create':
        $animalController->create();
        break;
    
    case '/animal/store':
        $animalController->store();
        break;
    
    case (preg_match('/^\/animal\/edit\/(\d+)$/', $uri, $matches) ? true : false):
        $animalController->edit($matches[1]);
        break;
    
    case (preg_match('/^\/animal\/update\/(\d+)$/', $uri, $matches) ? true : false):
        $animalController->update($matches[1]);
        break;
    
    case (preg_match('/^\/animal\/delete\/(\d+)$/', $uri, $matches) ? true : false):
        $animalController->delete($matches[1]);
        break;

    default:
        header('HTTP/1.1 404 Not Found');
        echo $twig->render('error/404.twig');
        break;
} 