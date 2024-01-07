<?php

namespace App\Entity;

use App\Repository\EducateursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateursRepository::class)]
class Educateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $Email_Educateur = null;

    #[ORM\Column(length: 50)]
    private ?string $Mdp_Educateur = null;

    #[ORM\Column]
    private ?int $Administrateur = null;

    #[ORM\Column(length: 30)]
    private ?string $Num_Licencie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailEducateur(): ?string
    {
        return $this->Email_Educateur;
    }

    public function setEmailEducateur(string $Email_Educateur): static
    {
        $this->Email_Educateur = $Email_Educateur;

        return $this;
    }

    public function getMdpEducateur(): ?string
    {
        return $this->Mdp_Educateur;
    }

    public function setMdpEducateur(string $Mdp_Educateur): static
    {
        $this->Mdp_Educateur = $Mdp_Educateur;

        return $this;
    }

    public function getAdministrateur(): ?int
    {
        return $this->Administrateur;
    }

    public function setAdministrateur(int $Administrateur): static
    {
        $this->Administrateur = $Administrateur;

        return $this;
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
}
