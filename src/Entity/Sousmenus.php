<?php

namespace App\Entity;

use App\Repository\SousmenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousmenusRepository::class)]
class Sousmenus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_ang = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\ManyToMany(targetEntity: Menus::class, mappedBy: 'sousmenus')]
    private Collection $menuses;

    public function __construct()
    {
        $this->menuses = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection<int, Menus>
     */
    public function getMenuses(): Collection
    {
        return $this->menuses;
    }

    public function addMenus(Menus $menus): self
    {
        if (!$this->menuses->contains($menus)) {
            $this->menuses->add($menus);
            $menus->addSousmenu($this);
        }

        return $this;
    }

    public function removeMenus(Menus $menus): self
    {
        if ($this->menuses->removeElement($menus)) {
            $menus->removeSousmenu($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom_fr;
    }
}
