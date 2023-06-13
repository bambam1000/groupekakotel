<?php

namespace App\Entity;

use App\Repository\IplanMenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplanMenusRepository::class)]
class IplanMenus
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

    #[ORM\ManyToMany(targetEntity: IplanSousmenus::class, inversedBy: 'iplanMenuses')]
    private Collection $iplansousmenus;

    #[ORM\ManyToMany(targetEntity: Iplanheader::class, mappedBy: 'iplanmenus')]
    private Collection $iplanheaders;

    #[ORM\ManyToMany(targetEntity: Iplanfooter::class, mappedBy: 'iplanmenus')]
    private Collection $iplanfooters;

    public function __construct()
    {
        $this->iplansousmenus = new ArrayCollection();
        $this->iplanheaders = new ArrayCollection();
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
     * @return Collection<int, IplanSousmenus>
     */
    public function getIplansousmenus(): Collection
    {
        return $this->iplansousmenus;
    }

    public function addIplansousmenu(IplanSousmenus $iplansousmenu): self
    {
        if (!$this->iplansousmenus->contains($iplansousmenu)) {
            $this->iplansousmenus->add($iplansousmenu);
        }

        return $this;
    }

    public function removeIplansousmenu(IplanSousmenus $iplansousmenu): self
    {
        $this->iplansousmenus->removeElement($iplansousmenu);

        return $this;
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
            $iplanheader->addIplanmenu($this);
        }

        return $this;
    }

    public function removeIplanheader(Iplanheader $iplanheader): self
    {
        if ($this->iplanheaders->removeElement($iplanheader)) {
            $iplanheader->removeIplanmenu($this);
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
            $iplanfooter->addIplanmenu($this);
        }

        return $this;
    }

    public function removeIplanfooter(Iplanfooter $iplanfooter): self
    {
        if ($this->iplanfooters->removeElement($iplanfooter)) {
            $iplanfooter->removeIplanmenu($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nom_fr;
    }
}
