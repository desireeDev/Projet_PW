<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $Code_Raccourci = null;

    #[ORM\Column(length: 50)]
    private ?string $Nom_Cat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeRaccourci(): ?string
    {
        return $this->Code_Raccourci;
    }

    public function setCodeRaccourci(string $Code_Raccourci): static
    {
        $this->Code_Raccourci = $Code_Raccourci;

        return $this;
    }

    public function getNomCat(): ?string
    {
        return $this->Nom_Cat;
    }

    public function setNomCat(string $Nom_Cat): static
    {
        $this->Nom_Cat = $Nom_Cat;

        return $this;
    }
}
