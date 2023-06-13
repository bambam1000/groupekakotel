<?php

namespace App\Entity;

use App\Repository\ActualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActualiteRepository::class)]
class Actualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\ManyToMany(targetEntity: Section::class, mappedBy: 'actualite')]
    private Collection $sections;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $chapeau_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $chapeau_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phrase1_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phrase1_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phrase2_fr = null;

    #[ORM\Column(length: 255)]
    private ?string $phrase2_ang = null;

    #[ORM\ManyToMany(targetEntity: Categories::class, inversedBy: 'actualites')]
    private Collection $categorie;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $category = null;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
        $this->categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(?string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getLienAng(): ?string
    {
        return $this->lien_ang;
    }

    public function setLienAng(?string $lien_ang): self
    {
        $this->lien_ang = $lien_ang;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Collection<int, Section>
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): self
    {
        if (!$this->sections->contains($section)) {
            $this->sections->add($section);
            $section->addActualite($this);
        }

        return $this;
    }

    public function removeSection(Section $section): self
    {
        if ($this->sections->removeElement($section)) {
            $section->removeActualite($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->titre;
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

    public function getPhrase1Fr(): ?string
    {
        return $this->phrase1_fr;
    }

    public function setPhrase1Fr(?string $phrase1_fr): self
    {
        $this->phrase1_fr = $phrase1_fr;

        return $this;
    }

    public function getPhrase1Ang(): ?string
    {
        return $this->phrase1_ang;
    }

    public function setPhrase1Ang(?string $phrase1_ang): self
    {
        $this->phrase1_ang = $phrase1_ang;

        return $this;
    }

    public function getPhrase2Fr(): ?string
    {
        return $this->phrase2_fr;
    }

    public function setPhrase2Fr(?string $phrase2_fr): self
    {
        $this->phrase2_fr = $phrase2_fr;

        return $this;
    }

    public function getPhrase2Ang(): ?string
    {
        return $this->phrase2_ang;
    }

    public function setPhrase2Ang(string $phrase2_ang): self
    {
        $this->phrase2_ang = $phrase2_ang;

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categories $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie->add($categorie);
        }

        return $this;
    }

    public function removeCategorie(Categories $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }
}
