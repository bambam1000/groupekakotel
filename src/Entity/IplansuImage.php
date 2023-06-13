<?php

namespace App\Entity;

use App\Repository\IplansuImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplansuImageRepository::class)]
class IplansuImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $altText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;

    #[ORM\OneToMany(mappedBy: 'image', targetEntity: IplansuSection::class)]
    private Collection $iplansuSections;

    #[ORM\OneToMany(mappedBy: 'image', targetEntity: IplansuActualite::class)]
    private Collection $iplansuActualites;

    #[ORM\OneToMany(mappedBy: 'image', targetEntity: IplansuLogo::class)]
    private Collection $iplansuLogos;

    public function __construct()
    {
        $this->iplansuSections = new ArrayCollection();
        $this->iplansuActualites = new ArrayCollection();
        $this->iplansuLogos = new ArrayCollection();
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
        return $this->altText;
    }

    public function setAltText(?string $altText): self
    {
        $this->altText = $altText;

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
     * @return Collection<int, IplansuSection>
     */
    public function getIplansuSections(): Collection
    {
        return $this->iplansuSections;
    }

    public function addIplansuSection(IplansuSection $iplansuSection): self
    {
        if (!$this->iplansuSections->contains($iplansuSection)) {
            $this->iplansuSections->add($iplansuSection);
            $iplansuSection->setImage($this);
        }

        return $this;
    }

    public function removeIplansuSection(IplansuSection $iplansuSection): self
    {
        if ($this->iplansuSections->removeElement($iplansuSection)) {
            // set the owning side to null (unless already changed)
            if ($iplansuSection->getImage() === $this) {
                $iplansuSection->setImage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, IplansuActualite>
     */
    public function getIplansuActualites(): Collection
    {
        return $this->iplansuActualites;
    }

    public function addIplansuActualite(IplansuActualite $iplansuActualite): self
    {
        if (!$this->iplansuActualites->contains($iplansuActualite)) {
            $this->iplansuActualites->add($iplansuActualite);
            $iplansuActualite->setImage($this);
        }

        return $this;
    }

    public function removeIplansuActualite(IplansuActualite $iplansuActualite): self
    {
        if ($this->iplansuActualites->removeElement($iplansuActualite)) {
            // set the owning side to null (unless already changed)
            if ($iplansuActualite->getImage() === $this) {
                $iplansuActualite->setImage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, IplansuLogo>
     */
    public function getIplansuLogos(): Collection
    {
        return $this->iplansuLogos;
    }

    public function addIplansuLogo(IplansuLogo $iplansuLogo): self
    {
        if (!$this->iplansuLogos->contains($iplansuLogo)) {
            $this->iplansuLogos->add($iplansuLogo);
            $iplansuLogo->setImage($this);
        }

        return $this;
    }

    public function removeIplansuLogo(IplansuLogo $iplansuLogo): self
    {
        if ($this->iplansuLogos->removeElement($iplansuLogo)) {
            // set the owning side to null (unless already changed)
            if ($iplansuLogo->getImage() === $this) {
                $iplansuLogo->setImage(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
