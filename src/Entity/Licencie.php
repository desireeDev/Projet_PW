<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NumL = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $CodeR = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumL(): ?string
    {
        return $this->NumL;
    }

    public function setNumL(string $NumL): static
    {
        $this->NumL = $NumL;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getCodeR(): ?string
    {
        return $this->CodeR;
    }

    public function setCodeR(string $CodeR): static
    {
        $this->CodeR = $CodeR;

        return $this;
    }
}
