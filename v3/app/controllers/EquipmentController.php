<?php
namespace App\Controllers;

use App\Models\Equipment;
use Doctrine\ORM\EntityManager;

class EquipmentController
{
    private $entityManager;
    private $twig;

    public function __construct(EntityManager $entityManager, \Twig\Environment $twig)
    {
        $this->entityManager = $entityManager;
        $this->twig = $twig;
    }

    public function index()
    {
        $equipments = $this->entityManager->getRepository(Equipment::class)->findAll();
        
        // Rendu avec Twig
        echo $this->twig->render('equipment/index.twig', [
            'equipments' => $equipments
        ]);
    }

    public function create()
    {
        echo $this->twig->render('equipment/create.twig');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $equipment = new Equipment();
            $equipment->setNom($_POST['nom'])
                     ->setEtat($_POST['etat'])
                     ->setDisponibilite(isset($_POST['disponibilite']));

            $this->entityManager->persist($equipment);
            $this->entityManager->flush();

            header('Location: /equipments');
            exit;
        }
    }

    public function edit($id)
    {
        $equipment = $this->entityManager->getRepository(Equipment::class)->find($id);
        echo $this->twig->render('equipment/edit.twig', ['equipment' => $equipment]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $equipment = $this->entityManager->getRepository(Equipment::class)->find($id);
            $equipment->setNom($_POST['nom'])
                     ->setEtat($_POST['etat'])
                     ->setDisponibilite(isset($_POST['disponibilite']));

            $this->entityManager->flush();

            header('Location: /equipments');
            exit;
        }
    }

    public function delete($id)
    {
        $equipment = $this->entityManager->getRepository(Equipment::class)->find($id);
        $this->entityManager->remove($equipment);
        $this->entityManager->flush();

        header('Location: /equipments');
        exit;
    }
} 