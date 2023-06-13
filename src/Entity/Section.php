<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_ang = null;

    #[ORM\ManyToMany(targetEntity: Actualite::class, inversedBy: 'sections')]
    private Collection $actualite;

    #[ORM\ManyToMany(targetEntity: Pages::class, mappedBy: 'section')]
    private Collection $pages;

    #[ORM\ManyToMany(targetEntity: Categories::class, inversedBy: 'sections')]
    private Collection $categorie;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $category = null;

    public function __construct()
    {
        $this->actualite = new ArrayCollection();
        $this->pages = new ArrayCollection();
        $this->categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFr(): ?string
    {
        return $this->nom_fr;
    }

    public function setNomFr(?string $nom_fr): self
    {
        $this->nom_fr = $nom_fr;

        return $this;
    }

    public function getNomAng(): ?string
    {
        return $this->nom_ang;
    }

    public function setNomAng(?string $nom_ang): self
    {
        $this->nom_ang = $nom_ang;

        return $this;
    }

    /**
     * @return Collection<int, Actualite>
     */
    public function getActualite(): Collection
    {
        return $this->actualite;
    }

    public function addActualite(Actualite $actualite): self
    {
        if (!$this->actualite->contains($actualite)) {
            $this->actualite->add($actualite);
        }

        return $this;
    }

    public function removeActualite(Actualite $actualite): self
    {
        $this->actualite->removeElement($actualite);

        return $this;
    }

    /**
     * @return Collection<int, Pages>
     */
    public function getPages(): Collection
    {
        return $this->pages;
    }

    public function addPage(Pages $page): self
    {
        if (!$this->pages->contains($page)) {
            $this->pages->add($page);
            $page->addSection($this);
        }

        return $this;
    }

    public function removePage(Pages $page): self
    {
        if ($this->pages->removeElement($page)) {
            $page->removeSection($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom_fr;
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
