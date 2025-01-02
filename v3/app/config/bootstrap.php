<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once dirname(__DIR__) . "/../vendor/autoload.php";

// Configuration de Doctrine
$paths = [dirname(__DIR__) . '/models'];
$isDevMode = true;

// Configuration de Doctrine avec les attributs
$config = ORMSetup::createAttributeMetadataConfiguration(
    $paths,
    $isDevMode
);

// Paramètres de connexion
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'gestion_ferme',
    'charset'  => 'utf8mb4'
];

// Création de l'EntityManager
$entityManager = EntityManager::create($dbParams, $config);

return $entityManager; 