<?php

namespace App\Entity;

use App\Repository\IplanActualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplanActualiteRepository::class)]
class IplanActualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $chapeau_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $chapeau_ang = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content_fr = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icon = null;

    #[ORM\ManyToMany(targetEntity: IplanSection::class, mappedBy: 'iplanactualite')]
    private Collection $iplanSections;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

    #[ORM\ManyToOne(inversedBy: 'iplanActualites')]
    private ?IplanImage $iplanimage = null;

    public function __construct()
    {
        $this->iplanSections = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTitreFr(): ?string
    {
        return $this->titre_fr;
    }

    public function setTitreFr(?string $titre_fr): self
    {
        $this->titre_fr = $titre_fr;

        return $this;
    }

    public function getTitreAng(): ?string
    {
        return $this->titre_ang;
    }

    public function setTitreAng(?string $titre_ang): self
    {
        $this->titre_ang = $titre_ang;

        return $this;
    }

    public function getChapeauFr(): ?string
    {
        return $this->chapeau_fr;
    }

    public function setChapeauFr(?string $chapeau_fr): self
    {
        $this->chapeau_fr = $chapeau_fr;

        return $this;
    }

    public function getChapeauAng(): ?string
    {
        return $this->chapeau_ang;
    }

    public function setChapeauAng(?string $chapeau_ang): self
    {
        $this->chapeau_ang = $chapeau_ang;

        return $this;
    }

    public function getContentFr(): ?string
    {
        return $this->content_fr;
    }

    public function setContentFr(?string $content_fr): self
    {
        $this->content_fr = $content_fr;

        return $this;
    }

    public function getContentAng(): ?string
    {
        return $this->content_ang;
    }

    public function setContentAng(?string $content_ang): self
    {
        $this->content_ang = $content_ang;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

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
            $iplanSection->addIplanactualite($this);
        }

        return $this;
    }

    public function removeIplanSection(IplanSection $iplanSection): self
    {
        if ($this->iplanSections->removeElement($iplanSection)) {
            $iplanSection->removeIplanactualite($this);
        }

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getIplanimage(): ?IplanImage
    {
        return $this->iplanimage;
    }

    public function setIplanimage(?IplanImage $iplanimage): self
    {
        $this->iplanimage = $iplanimage;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
