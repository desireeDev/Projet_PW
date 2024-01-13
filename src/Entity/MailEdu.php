<?php

namespace App\Entity;

use App\Repository\MailEducateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;

#[ORM\Entity(repositoryClass: MailEducateurRepository::class)]
class MailEducateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'date_envoi', type: Types::DATETIME_MUTABLE, length: 255)]
    private ?\DateTimeInterface $dateEnvoi = null;

    #[ORM\Column(length: 255)]
    private ?string $objet = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    #[ORM\ManyToOne(inversedBy: 'mailEnvoyes')]
    #[ORM\JoinColumn(name: 'expediteur_id')]
    private ?Educateur $expediteur = null;

    #[ORM\ManyToMany(targetEntity: Educateur::class, inversedBy: 'mailRecus',  fetch: 'EAGER')]
    #[ORM\JoinTable(name: 'mail_educateur_educateur')]
    private Collection $destinataires;

    public function __construct()
    {
        $this->destinataires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $date_envoi): static
    {
        $this->dateEnvoi = $date_envoi;

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

    public function getExpediteur(): ?Educateur
    {
        return $this->expediteur;
    }

    public function setExpediteur(?Educateur $expediteur): static
    {
        $this->expediteur = $expediteur;
        return $this;
    }

    /**
     * @return Collection<int, Educateur>
     */
    public function getDestinataires(): Collection
    {
        return $this->destinataires;
    }

    public function addDestinataire(Educateur $destinataire): static
    {
        if (!$this->destinataires->contains($destinataire)) {
            $this->destinataires->add($destinataire);
        }

        return $this;
    }

    public function removeDestinataire(Educateur $destinataire): static
    {
        $this->destinataires->removeElement($destinataire);
        return $this;
    }
}