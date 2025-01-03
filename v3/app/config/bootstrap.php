<?php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . "/../vendor/autoload.php";

// Configuration Doctrine
$paths = [dirname(__DIR__) . '/models'];
$isDevMode = true;

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

// Configuration base de données
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'gestion_universitaire',
];

// Création EntityManager
$entityManager = EntityManager::create($dbParams, $config);

// Configuration Twig
$loader = new FilesystemLoader(dirname(__DIR__) . '/views');
$twig = new Environment($loader, [
    'cache' => false,  // Désactive le cache en développement
    'debug' => true
]);

return [
    'entityManager' => $entityManager,
    'twig' => $twig
]; 