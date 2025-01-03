<?php
namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'equipments')]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $nom;

    #[ORM\Column(type: 'string', length: 50)]
    private $etat;

    #[ORM\Column(type: 'boolean')]
    private $disponibilite;

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function getDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

    // Setters
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;
        return $this;
    }

    public function setDisponibilite(bool $disponibilite): self
    {
        $this->disponibilite = $disponibilite;
        return $this;
    }
}