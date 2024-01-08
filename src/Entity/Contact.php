<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
 /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=50)
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    private $Code_Contact;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Nom_Contact;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Prenom_Contact;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Email_Contact;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numero_Contact;

    // ...

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Licencie")
     * @ORM\JoinColumn(name="num_licencie", referencedColumnName="numLicencie", nullable=false)
     */
    private $Num_Licencie;

    #[ORM\ManyToMany(targetEntity: MailContact::class, mappedBy: 'contact')]
    private Collection $messagenvoye;

    public function __construct()
    {
        $this->messagenvoye = new ArrayCollection();
    }

    // ...

    public function getCodeContact(): ?string
    {
        return $this->codeContact;
    }

    public function setCodeContact(string $codeContact): self
    {
        $this->codeContact = $codeContact;

        return $this;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(string $prenomContact): self
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getNumeroContact(): ?int
    {
        return $this->numeroContact;
    }

    public function setNumeroContact(int $numeroContact): self
    {
        $this->numeroContact = $numeroContact;

        return $this;
    }

    // ...

    public function getNumLicencie(): ?Licencie
    {
        return $this->numLicencie;
    }

    public function setNumLicencie(?Licencie $numLicencie): self
    {
        $this->numLicencie = $numLicencie;

        return $this;
    }

    /**
     * @return Collection<int, MailContact>
     */
    public function getMessagenvoye(): Collection
    {
        return $this->messagenvoye;
    }

    public function addMessagenvoye(MailContact $messagenvoye): static
    {
        if (!$this->messagenvoye->contains($messagenvoye)) {
            $this->messagenvoye->add($messagenvoye);
            $messagenvoye->addContact($this);
        }

        return $this;
    }

    public function removeMessagenvoye(MailContact $messagenvoye): static
    {
        if ($this->messagenvoye->removeElement($messagenvoye)) {
            $messagenvoye->removeContact($this);
        }

        return $this;
    }


    
}
