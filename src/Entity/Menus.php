<?php

namespace App\Entity;

use App\Repository\MenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenusRepository::class)]
class Menus
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

    #[ORM\ManyToMany(targetEntity: Header::class, mappedBy: 'menus')]
    private Collection $headers;

    #[ORM\ManyToMany(targetEntity: Sousmenus::class, inversedBy: 'menuses')]
    private Collection $sousmenus;

    public function __construct()
    {
        $this->headers = new ArrayCollection();
        $this->sousmenus = new ArrayCollection();
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
     * @return Collection<int, Header>
     */
    public function getHeaders(): Collection
    {
        return $this->headers;
    }

    public function addHeader(Header $header): self
    {
        if (!$this->headers->contains($header)) {
            $this->headers->add($header);
            $header->addMenu($this);
        }

        return $this;
    }

    public function removeHeader(Header $header): self
    {
        if ($this->headers->removeElement($header)) {
            $header->removeMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Sousmenus>
     */
    public function getSousmenus(): Collection
    {
        return $this->sousmenus;
    }

    public function addSousmenu(Sousmenus $sousmenu): self
    {
        if (!$this->sousmenus->contains($sousmenu)) {
            $this->sousmenus->add($sousmenu);
        }

        return $this;
    }

    public function removeSousmenu(Sousmenus $sousmenu): self
    {
        $this->sousmenus->removeElement($sousmenu);

        return $this;
    }

    public function __toString()
    {
        return $this->nom_fr;
    }
}
