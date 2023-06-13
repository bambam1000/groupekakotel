<?php

namespace App\Entity;

use App\Repository\IplanSousmenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplanSousmenusRepository::class)]
class IplanSousmenus
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

    #[ORM\ManyToMany(targetEntity: IplanMenus::class, mappedBy: 'iplansousmenus')]
    private Collection $iplanMenuses;

    #[ORM\ManyToMany(targetEntity: Iplanfooter::class, mappedBy: 'iplansousmenus')]
    private Collection $iplanfooters;

    public function __construct()
    {
        $this->iplanMenuses = new ArrayCollection();
        $this->iplanfooters = new ArrayCollection();
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
     * @return Collection<int, IplanMenus>
     */
    public function getIplanMenuses(): Collection
    {
        return $this->iplanMenuses;
    }

    public function addIplanMenus(IplanMenus $iplanMenus): self
    {
        if (!$this->iplanMenuses->contains($iplanMenus)) {
            $this->iplanMenuses->add($iplanMenus);
            $iplanMenus->addIplansousmenu($this);
        }

        return $this;
    }

    public function removeIplanMenus(IplanMenus $iplanMenus): self
    {
        if ($this->iplanMenuses->removeElement($iplanMenus)) {
            $iplanMenus->removeIplansousmenu($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Iplanfooter>
     */
    public function getIplanfooters(): Collection
    {
        return $this->iplanfooters;
    }

    public function addIplanfooter(Iplanfooter $iplanfooter): self
    {
        if (!$this->iplanfooters->contains($iplanfooter)) {
            $this->iplanfooters->add($iplanfooter);
            $iplanfooter->addIplansousmenu($this);
        }

        return $this;
    }

    public function removeIplanfooter(Iplanfooter $iplanfooter): self
    {
        if ($this->iplanfooters->removeElement($iplanfooter)) {
            $iplanfooter->removeIplansousmenu($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom_fr;
    }
}
