<?php

namespace App\Entity;

use App\Repository\IplansuFooterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplansuFooterRepository::class)]
class IplansuFooter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_2fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_2ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_3fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_3ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_4fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_4ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paragraphe_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paragraphe_ang = null;

    #[ORM\ManyToMany(targetEntity: IplansuMenus::class, inversedBy: 'iplansuFooters')]
    private Collection $menus;

    #[ORM\ManyToMany(targetEntity: IplansuSousmenus::class, inversedBy: 'iplansuFooters')]
    private Collection $sousmenus;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->sousmenus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre1(): ?string
    {
        return $this->titre_1;
    }

    public function setTitre1(?string $titre_1): self
    {
        $this->titre_1 = $titre_1;

        return $this;
    }

    public function getTitre2fr(): ?string
    {
        return $this->titre_2fr;
    }

    public function setTitre2fr(?string $titre_2fr): self
    {
        $this->titre_2fr = $titre_2fr;

        return $this;
    }

    public function getTitre2ang(): ?string
    {
        return $this->titre_2ang;
    }

    public function setTitre2ang(?string $titre_2ang): self
    {
        $this->titre_2ang = $titre_2ang;

        return $this;
    }

    public function getTitre3fr(): ?string
    {
        return $this->titre_3fr;
    }

    public function setTitre3fr(?string $titre_3fr): self
    {
        $this->titre_3fr = $titre_3fr;

        return $this;
    }

    public function getTitre3ang(): ?string
    {
        return $this->titre_3ang;
    }

    public function setTitre3ang(?string $titre_3ang): self
    {
        $this->titre_3ang = $titre_3ang;

        return $this;
    }

    public function getTitre4fr(): ?string
    {
        return $this->titre_4fr;
    }

    public function setTitre4fr(?string $titre_4fr): self
    {
        $this->titre_4fr = $titre_4fr;

        return $this;
    }

    public function getTitre4ang(): ?string
    {
        return $this->titre_4ang;
    }

    public function setTitre4ang(?string $titre_4ang): self
    {
        $this->titre_4ang = $titre_4ang;

        return $this;
    }

    public function getParagrapheFr(): ?string
    {
        return $this->paragraphe_fr;
    }

    public function setParagrapheFr(?string $paragraphe_fr): self
    {
        $this->paragraphe_fr = $paragraphe_fr;

        return $this;
    }

    public function getParagrapheAng(): ?string
    {
        return $this->paragraphe_ang;
    }

    public function setParagrapheAng(?string $paragraphe_ang): self
    {
        $this->paragraphe_ang = $paragraphe_ang;

        return $this;
    }

    /**
     * @return Collection<int, IplansuMenus>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(IplansuMenus $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus->add($menu);
        }

        return $this;
    }

    public function removeMenu(IplansuMenus $menu): self
    {
        $this->menus->removeElement($menu);

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
