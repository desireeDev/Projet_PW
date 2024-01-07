<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $Mdp = null;

    #[ORM\Column(length: 255)]
    private ?string $Admin = null;

    #[ORM\Column(length: 255)]
    private ?string $NumL = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->Mdp;
    }

    public function setMdp(string $Mdp): static
    {
        $this->Mdp = $Mdp;

        return $this;
    }

    public function getAdmin(): ?string
    {
        return $this->Admin;
    }

    public function setAdmin(string $Admin): static
    {
        $this->Admin = $Admin;

        return $this;
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
}
