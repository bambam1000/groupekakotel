<?php

namespace App\Entity;

use App\Repository\IplanImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplanImageRepository::class)]
class IplanImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alt_text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;

    #[ORM\OneToMany(mappedBy: 'iplanimage', targetEntity: IplanActualite::class)]
    private Collection $iplanActualites;

    #[ORM\OneToMany(mappedBy: 'iplanimage', targetEntity: IplanSection::class)]
    private Collection $iplanSections;

    #[ORM\OneToMany(mappedBy: 'iplanimage', targetEntity: Iplanlogo::class)]
    private Collection $iplanlogos;

    #[ORM\OneToMany(mappedBy: 'logoIplan', targetEntity: Iplanheader::class)]
    private Collection $iplanheaders;

    public function __construct()
    {
        $this->iplanActualites = new ArrayCollection();
        $this->iplanSections = new ArrayCollection();
        $this->iplanlogos = new ArrayCollection();
        $this->iplanheaders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAltText(): ?string
    {
        return $this->alt_text;
    }

    public function setAltText(?string $alt_text): self
    {
        $this->alt_text = $alt_text;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return Collection<int, IplanActualite>
     */
    public function getIplanActualites(): Collection
    {
        return $this->iplanActualites;
    }

    public function addIplanActualite(IplanActualite $iplanActualite): self
    {
        if (!$this->iplanActualites->contains($iplanActualite)) {
            $this->iplanActualites->add($iplanActualite);
            $iplanActualite->setIplanimage($this);
        }

        return $this;
    }

    public function removeIplanActualite(IplanActualite $iplanActualite): self
    {
        if ($this->iplanActualites->removeElement($iplanActualite)) {
            // set the owning side to null (unless already changed)
            if ($iplanActualite->getIplanimage() === $this) {
                $iplanActualite->setIplanimage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, IplanSection>
     */
    public function getIplanSections(): Collection
    {
        return $this->iplanSections;
    }

    public function addIplanSection(IplanSection $iplanSection): self
    {
        if (!$this->iplanSections->contains($iplanSection)) {
            $this->iplanSections->add($iplanSection);
            $iplanSection->setIplanimage($this);
        }

        return $this;
    }

    public function removeIplanSection(IplanSection $iplanSection): self
    {
        if ($this->iplanSections->removeElement($iplanSection)) {
            // set the owning side to null (unless already changed)
            if ($iplanSection->getIplanimage() === $this) {
                $iplanSection->setIplanimage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Iplanlogo>
     */
    public function getIplanlogos(): Collection
    {
        return $this->iplanlogos;
    }

    public function addIplanlogo(Iplanlogo $iplanlogo): self
    {
        if (!$this->iplanlogos->contains($iplanlogo)) {
            $this->iplanlogos->add($iplanlogo);
            $iplanlogo->setIplanimage($this);
        }

        return $this;
    }

    public function removeIplanlogo(Iplanlogo $iplanlogo): self
    {
        if ($this->iplanlogos->removeElement($iplanlogo)) {
            // set the owning side to null (unless already changed)
            if ($iplanlogo->getIplanimage() === $this) {
                $iplanlogo->setIplanimage(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @return Collection<int, Iplanheader>
     */
    public function getIplanheaders(): Collection
    {
        return $this->iplanheaders;
    }

    public function addIplanheader(Iplanheader $iplanheader): self
    {
        if (!$this->iplanheaders->contains($iplanheader)) {
            $this->iplanheaders->add($iplanheader);
            $iplanheader->setLogoIplan($this);
        }

        return $this;
    }

    public function removeIplanheader(Iplanheader $iplanheader): self
    {
        if ($this->iplanheaders->removeElement($iplanheader)) {
            // set the owning side to null (unless already changed)
            if ($iplanheader->getLogoIplan() === $this) {
                $iplanheader->setLogoIplan(null);
            }
        }

        return $this;
    }
}
