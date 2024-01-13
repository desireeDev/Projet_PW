<?php

namespace App\Entity;

use App\Repository\LicenciesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicenciesRepository::class)]
class Licencies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[ORM\Column(length: 30)]
    private ?string $Nom_Licencie = null;

    #[ORM\Column(length: 39)]
    private ?string $Prenom_Licencie = null;



    #[ORM\Column(length: 30)]
    private ?string $id_cat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLicencie(): ?string
    {
        return $this->Nom_Licencie;
    }

    public function setNomLicencie(string $Nom_Licencie): static
    {
        $this->Nom_Licencie = $Nom_Licencie;

        return $this;
    }

    public function getPrenomLicencie(): ?string
    {
        return $this->Prenom_Licencie;
    }

    public function setPrenomLicencie(string $Prenom_Licencie): static
    {
        $this->Prenom_Licencie = $Prenom_Licencie;

        return $this;
    }

    public function getIdCat(): ?string
    {
        return $this->id_cat;

    }


    public function setIdCat(string $id_cat): static
    {
        $this->id_cat = $id_cat;

        return $this;
    }

}