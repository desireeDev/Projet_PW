<?php

namespace App\Entity;

use App\Repository\LicenciesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicenciesRepository::class)]
class Licencies
{
 /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=30)
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    private $numLicencie;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nomLicencie;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $prenomLicencie;

    // ...

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie")
     * @ORM\JoinColumn(name="code_raccourci", referencedColumnName="codeRaccourci", nullable=false)
     */
    private $categorie;

    // ...

    public function getNumLicencie(): ?string
    {
        return $this->numLicencie;
    }

    public function setNumLicencie(string $numLicencie): self
    {
        $this->numLicencie = $numLicencie;

        return $this;
    }

    public function getNomLicencie(): ?string
    {
        return $this->nomLicencie;
    }

    public function setNomLicencie(string $nomLicencie): self
    {
        $this->nomLicencie = $nomLicencie;

        return $this;
    }

    public function getPrenomLicencie(): ?string
    {
        return $this->prenomLicencie;
    }

    public function setPrenomLicencie(string $prenomLicencie): self
    {
        $this->prenomLicencie = $prenomLicencie;

        return $this;
    }

    // ...

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    // ...


}
