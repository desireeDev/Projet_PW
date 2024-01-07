<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Code_Contact = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_Contact = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom_Contact = null;

    #[ORM\Column(length: 255)]
    private ?string $Email_Contact = null;

    #[ORM\Column]
    private ?int $Numero_Contact = null;

    #[ORM\Column(length: 30)]
    private ?string $Num_Licencie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeContact(): ?string
    {
        return $this->Code_Contact;
    }

    public function setCodeContact(string $Code_Contact): static
    {
        $this->Code_Contact = $Code_Contact;

        return $this;
    }

    public function getNomContact(): ?string
    {
        return $this->Nom_Contact;
    }

    public function setNomContact(string $Nom_Contact): static
    {
        $this->Nom_Contact = $Nom_Contact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->Prenom_Contact;
    }

    public function setPrenomContact(string $Prenom_Contact): static
    {
        $this->Prenom_Contact = $Prenom_Contact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->Email_Contact;
    }

    public function setEmailContact(string $Email_Contact): static
    {
        $this->Email_Contact = $Email_Contact;

        return $this;
    }

    public function getNumeroContact(): ?int
    {
        return $this->Numero_Contact;
    }

    public function setNumeroContact(int $Numero_Contact): static
    {
        $this->Numero_Contact = $Numero_Contact;

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
