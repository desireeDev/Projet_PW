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

    #[ORM\Column(length: 30)]
    private ?string $Email_Educateur = null;

    #[ORM\Column(length: 50)]
    private ?string $Mdp_Educateur = null;

    #[ORM\Column(length: 1)]
    private ?bool $Administrateur = null;

    #[ORM\Column(length: 30)]
    private ?string $id_licencie = null;

    #[ORM\OneToMany(mappedBy:'expediteur',targetEntity:MailEducateur::class)]
    private  Collection $mailEnvoyes;

    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: MailContact::class)]
    private Collection  $mailsContactEnvoyes;

    #[ORM\ManyToMany(targetEntity: MailEducateur::class, mappedBy: 'destinataires', fetch: 'EAGER')]
    private  Collection $mailRecus;

 

    public function __construct()
    {
        $this->mailEnvoyes = new ArrayCollection();
        $this->mailRecus = new ArrayCollection();
        $this->mailsContactEnvoyes = new ArrayCollection();
    }

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

    public function getMailEnvoyes(): Collection
    {
        return $this->mailEnvoyes;
    }

    public function getMailsContactEnvoyes(): Collection
    {
        return $this->mailsContactEnvoyes;
    }

  public function getMailRecus(): Collection
    {
        return $this->mailRecus;
    }


    public function setAdministrateur(int $Administrateur): static
    {
        $this->Administrateur = $Administrateur;

        return $this;
    }


//User

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $admin = $this->est_administrateur;

        if($admin == 1){
            $roles[] = 'ROLE_ADMIN';
        }

        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        in_array('ROLE_ADMIN', $roles) ? $this->est_administrateur = 0 : $this->est_administrateur = 1 ;
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
    public function addMailEducateur(MailEducateur $mailEducateur): static
    {
        if (!$this->mailEnvoyes->contains($mailEducateur)) {
            $this->mailEnvoyes->add($mailEducateur);
            $mailEducateur->setExpediteur($this);
        }

        return $this;
    }

    public function removeMailEducateur(MailEducateur $mailEducateur): static
    {
        if ($this->mailEnvoyes->removeElement($mailEducateur)) {
            // set the owning side to null (unless already changed)
            if ($mailEducateur->getExpediteur() === $this) {
                $mailEducateur->setExpediteur(null);
            }
        }

        return $this;
    }


    public function addMailRecu(MailEducateur $mailRecu): static
    {
        if (!$this->mailRecus->contains($mailRecu)) {
            $this->mailRecus->add($mailRecu);
            $mailRecu->addDestinataire($this);
        }

        return $this;
    }

    public function removeMailRecu(MailEducateur $mailRecu): static
    {
        if ($this->mailRecus->removeElement($mailRecu)) {
            $mailRecu->removeDestinataire($this);
        }

        return $this;
    }

    public function addMailContact(MailContact $mailContact): static
    {
        if (!$this->mailContactEnvoyes->contains($mailContact)) {
            $this->mailContactEnvoyes->add($mailContact);
            $mailContact->setExpediteur($this);
        }

        return $this;
    }

    public function removeMailContact(MailContact $mailContact): static
    {
        if ($this->mailContactEnvoyes->removeElement($mailContact)) {
            // set the owning side to null (unless already changed)
            if ($mailContact->getExpediteur() === $this) {
                $mailContact->setExpediteur(null);
            }
        }

        return $this;
    }
}