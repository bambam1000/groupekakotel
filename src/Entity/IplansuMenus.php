<?php

namespace App\Entity;

use App\Repository\IplansuMenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplansuMenusRepository::class)]
class IplansuMenus
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

    #[ORM\ManyToMany(targetEntity: IplansuSousmenus::class, inversedBy: 'iplansuMenuses')]
    private Collection $sousmenus;

    #[ORM\ManyToMany(targetEntity: IplansuHeader::class, mappedBy: 'menus')]
    private Collection $iplansuHeaders;

    #[ORM\ManyToMany(targetEntity: IplansuFooter::class, mappedBy: 'menus')]
    private Collection $iplansuFooters;

    public function __construct()
    {
        $this->sousmenus = new ArrayCollection();
        $this->iplansuHeaders = new ArrayCollection();
        $this->iplansuFooters = new ArrayCollection();
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
     * @return Collection<int, IplansuSousmenus>
     */
    public function getSousmenus(): Collection
    {
        return $this->sousmenus;
    }

    public function addSousmenu(IplansuSousmenus $sousmenu): self
    {
        if (!$this->sousmenus->contains($sousmenu)) {
            $this->sousmenus->add($sousmenu);
        }

        return $this;
    }

    public function removeSousmenu(IplansuSousmenus $sousmenu): self
    {
        $this->sousmenus->removeElement($sousmenu);

        return $this;
    }

    /**
     * @return Collection<int, IplansuHeader>
     */
    public function getIplansuHeaders(): Collection
    {
        return $this->iplansuHeaders;
    }

    public function addIplansuHeader(IplansuHeader $iplansuHeader): self
    {
        if (!$this->iplansuHeaders->contains($iplansuHeader)) {
            $this->iplansuHeaders->add($iplansuHeader);
            $iplansuHeader->addMenu($this);
        }

        return $this;
    }

    public function removeIplansuHeader(IplansuHeader $iplansuHeader): self
    {
        if ($this->iplansuHeaders->removeElement($iplansuHeader)) {
            $iplansuHeader->removeMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, IplansuFooter>
     */
    public function getIplansuFooters(): Collection
    {
        return $this->iplansuFooters;
    }

    public function addIplansuFooter(IplansuFooter $iplansuFooter): self
    {
        if (!$this->iplansuFooters->contains($iplansuFooter)) {
            $this->iplansuFooters->add($iplansuFooter);
            $iplansuFooter->addMenu($this);
        }

        return $this;
    }

    public function removeIplansuFooter(IplansuFooter $iplansuFooter): self
    {
        if ($this->iplansuFooters->removeElement($iplansuFooter)) {
            $iplansuFooter->removeMenu($this);
        }

        return $this;
    }
}
