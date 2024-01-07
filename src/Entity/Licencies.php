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
    private ?string $Num_Licencie = null;

    #[ORM\Column(length: 30)]
    private ?string $Nom_Licencie = null;

    #[ORM\Column(length: 39)]
    private ?string $Prenom_Licencie = null;

    #[ORM\Column(length: 20)]
    private ?string $Contact_Licencie = null;

    #[ORM\Column(length: 30)]
    private ?string $Code_Raccourci = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumLicencie(): ?string
    {
        return $this->Num_Licencie;
    }

    public function setNumLicencie(string $Num_Licencie): static
    {
        $this->Num_Licencie = $Num_Licencie;

        return $this;
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

    public function getContactLicencie(): ?string
    {
        return $this->Contact_Licencie;
    }

    public function setContactLicencie(string $Contact_Licencie): static
    {
        $this->Contact_Licencie = $Contact_Licencie;

        return $this;
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
}
