<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]

class Categories
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=30)
     * 
     * 
     * 
     * 
     */

     #[ORM\Id]
     #[ORM\GeneratedValue]
     #[ORM\Column]
     private ?int $id = null;

    private $codeRaccourci;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomCat;

    // ...

    public function getCodeRaccourci(): ?string
    {
        return $this->codeRaccourci;
    }

    public function setCodeRaccourci(string $codeRaccourci): self
    {
        $this->codeRaccourci = $codeRaccourci;

        return $this;
    }

    public function getNomCat(): ?string
    {
        return $this->nomCat;
    }

    public function setNomCat(string $nomCat): self
    {
        $this->nomCat = $nomCat;

        return $this;
    }

    // ...
}
