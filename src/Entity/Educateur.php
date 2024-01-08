<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur
{
  /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=30)
     * 
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    private $emailEducateur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $mdpEducateur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $administrateur;

    // ...

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Licencie")
     * @ORM\JoinColumn(name="num_licencie", referencedColumnName="numLicencie", nullable=false)
     */
    private $numLicencie;

    #[ORM\OneToMany(mappedBy: 'educateurs', targetEntity: MailEdu::class, orphanRemoval: true)]
    private Collection $messageenvoye;

    public function __construct()
    {
        $this->messageenvoye = new ArrayCollection();
    }

    // ...

    public function getEmailEducateur(): ?string
    {
        return $this->emailEducateur;
    }

    public function setEmailEducateur(string $emailEducateur): self
    {
        $this->emailEducateur = $emailEducateur;

        return $this;
    }

    public function getMdpEducateur(): ?string
    {
        return $this->mdpEducateur;
    }

    public function setMdpEducateur(string $mdpEducateur): self
    {
        $this->mdpEducateur = $mdpEducateur;

        return $this;
    }

    public function isAdministrateur(): ?bool
    {
        return $this->administrateur;
    }

    public function setAdministrateur(bool $administrateur): self
    {
        $this->administrateur = $administrateur;

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
     * @return Collection<int, MailEdu>
     */
    public function getMessageenvoye(): Collection
    {
        return $this->messageenvoye;
    }

    public function addMessageenvoye(MailEdu $messageenvoye): static
    {
        if (!$this->messageenvoye->contains($messageenvoye)) {
            $this->messageenvoye->add($messageenvoye);
            $messageenvoye->setEducateurs($this);
        }

        return $this;
    }

    public function removeMessageenvoye(MailEdu $messageenvoye): static
    {
        if ($this->messageenvoye->removeElement($messageenvoye)) {
            // set the owning side to null (unless already changed)
            if ($messageenvoye->getEducateurs() === $this) {
                $messageenvoye->setEducateurs(null);
            }
        }

        return $this;
    }
}