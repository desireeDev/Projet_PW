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


    #[ORM\Column(length: 30)]
    private ?string $Nom_Contact = null;

    #[ORM\Column(length: 30)]
    private ?string $Prenom_Contact = null;

    #[ORM\Column(length: 30)]
    private ?string $Email_Contact = null;

    #[ORM\Column]
    private ?int $Numero_Contact = null;

    #[ORM\Column(length: 11)]
    private ?string $id_licencie = null;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: Contact::class)]
    private Collection  $contact;

    #[ORM\ManyToMany( targetEntity: MailContact::class, mappedBy: 'destinataires', fetch: 'EAGER')]
    private Collection  $mailRecus;



    public function __construct()
    {
        $this->contact = new ArrayCollection();
        $this->mailRecus = new ArrayCollection();
    }

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
        return $this->id_licencie;
    }

    public function setNumLicencie(string $id_licencie): static
    {
        $this->id_licencie = $id_licencie;

        return $this;
    }
}