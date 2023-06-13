<?php

namespace App\Entity;

use App\Repository\IplansuSousmenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplansuSousmenusRepository::class)]
class IplansuSousmenus
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

    #[ORM\ManyToMany(targetEntity: IplansuMenus::class, mappedBy: 'sousmenus')]
    private Collection $iplansuMenuses;

    #[ORM\ManyToMany(targetEntity: IplansuFooter::class, mappedBy: 'sousmenus')]
    private Collection $iplansuFooters;

    public function __construct()
    {
        $this->iplansuMenuses = new ArrayCollection();
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
     * @return Collection<int, IplansuMenus>
     */
    public function getIplansuMenuses(): Collection
    {
        return $this->iplansuMenuses;
    }

    public function addIplansuMenus(IplansuMenus $iplansuMenus): self
    {
        if (!$this->iplansuMenuses->contains($iplansuMenus)) {
            $this->iplansuMenuses->add($iplansuMenus);
            $iplansuMenus->addSousmenu($this);
        }

        return $this;
    }

    public function removeIplansuMenus(IplansuMenus $iplansuMenus): self
    {
        if ($this->iplansuMenuses->removeElement($iplansuMenus)) {
            $iplansuMenus->removeSousmenu($this);
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
            $iplansuFooter->addSousmenu($this);
        }

        return $this;
    }

    public function removeIplansuFooter(IplansuFooter $iplansuFooter): self
    {
        if ($this->iplansuFooters->removeElement($iplansuFooter)) {
            $iplansuFooter->removeSousmenu($this);
        }

        return $this;
    }
}
