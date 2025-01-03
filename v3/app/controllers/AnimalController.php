<?php
namespace App\Controllers;

use App\Models\Animal;
use Doctrine\ORM\EntityManager;

class AnimalController
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
        $animals = $this->entityManager->getRepository(Animal::class)->findAll();
        echo $this->twig->render('animal/index.twig', ['animals' => $animals]);
    }

    public function create()
    {
        $equipments = $this->entityManager->getRepository(Equipment::class)->findAll();
        echo $this->twig->render('animal/create.twig', ['equipments' => $equipments]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $animal = new Animal();
            $animal->setType($_POST['type'])
                  ->setAge((int)$_POST['age'])
                  ->setSante($_POST['sante']);

            if (isset($_POST['equipment_id'])) {
                $equipment = $this->entityManager->getRepository(Equipment::class)->find($_POST['equipment_id']);
                $animal->setEquipment($equipment);
            }

            $this->entityManager->persist($animal);
            $this->entityManager->flush();

            header('Location: /animals');
            exit;
        }
    }

    public function edit($id)
    {
        $animal = $this->entityManager->getRepository(Animal::class)->find($id);
        $equipments = $this->entityManager->getRepository(Equipment::class)->findAll();
        echo $this->twig->render('animal/edit.twig', [
            'animal' => $animal,
            'equipments' => $equipments
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $animal = $this->entityManager->getRepository(Animal::class)->find($id);
            $animal->setType($_POST['type'])
                  ->setAge((int)$_POST['age'])
                  ->setSante($_POST['sante']);

            if (isset($_POST['equipment_id'])) {
                $equipment = $this->entityManager->getRepository(Equipment::class)->find($_POST['equipment_id']);
                $animal->setEquipment($equipment);
            }

            $this->entityManager->flush();

            header('Location: /animals');
            exit;
        }
    }

    public function delete($id)
    {
        $animal = $this->entityManager->getRepository(Animal::class)->find($id);
        $this->entityManager->remove($animal);
        $this->entityManager->flush();

        header('Location: /animals');
        exit;
    }
} 