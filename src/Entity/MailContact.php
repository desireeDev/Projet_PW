<?php

namespace App\Entity;

use App\Repository\MailContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MailContactRepository::class)]
class MailContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $dateEnvoi = null;

    #[ORM\Column(length: 50)]
    private ?string $objet = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    #[ORM\Column(length: 20)]
    private ?string $Contact_Licencie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEnvoi(): ?string
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(string $dateEnvoi): static
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): static
    {
        $this->objet = $objet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

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
}
