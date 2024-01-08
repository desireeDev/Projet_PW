<?php

namespace App\Entity;

use App\Repository\MailEduRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MailEduRepository::class)]
class MailEdu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateenvoi = null;

    #[ORM\Column(length: 30)]
    private ?string $objet = null;

    #[ORM\Column(length: 30)]
    private ?string $message = null;

    #[ORM\ManyToOne(inversedBy: 'messageenvoye')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Educateur $educateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateenvoi(): ?\DateTimeInterface
    {
        return $this->dateenvoi;
    }

    public function setDateenvoi(\DateTimeInterface $dateenvoi): static
    {
        $this->dateenvoi = $dateenvoi;

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

    public function getEducateurs(): ?Educateur
    {
        return $this->educateurs;
    }

    public function setEducateurs(?Educateur $educateurs): static
    {
        $this->educateurs = $educateurs;

        return $this;
    }
}
