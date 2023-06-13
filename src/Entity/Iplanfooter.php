<?php

namespace App\Entity;

use App\Repository\IplanfooterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplanfooterRepository::class)]
class Iplanfooter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre1_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre1_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre2_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre2_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre3_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre3_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre4_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre4_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paragraphe_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paragraphe_ang = null;

    #[ORM\ManyToMany(targetEntity: IplanMenus::class, inversedBy: 'iplanfooters')]
    private Collection $iplanmenus;

    #[ORM\ManyToMany(targetEntity: IplanSousmenus::class, inversedBy: 'iplanfooters')]
    private Collection $iplansousmenus;

    public function __construct()
    {
        $this->iplanmenus = new ArrayCollection();
        $this->iplansousmenus = new ArrayCollection();
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

    public function getTitre1Fr(): ?string
    {
        return $this->titre1_fr;
    }

    public function setTitre1Fr(?string $titre1_fr): self
    {
        $this->titre1_fr = $titre1_fr;

        return $this;
    }

    public function getTitre1Ang(): ?string
    {
        return $this->titre1_ang;
    }

    public function setTitre1Ang(?string $titre1_ang): self
    {
        $this->titre1_ang = $titre1_ang;

        return $this;
    }

    public function getTitre2Fr(): ?string
    {
        return $this->titre2_fr;
    }

    public function setTitre2Fr(?string $titre2_fr): self
    {
        $this->titre2_fr = $titre2_fr;

        return $this;
    }

    public function getTitre2Ang(): ?string
    {
        return $this->titre2_ang;
    }

    public function setTitre2Ang(?string $titre2_ang): self
    {
        $this->titre2_ang = $titre2_ang;

        return $this;
    }

    public function getTitre3Fr(): ?string
    {
        return $this->titre3_fr;
    }

    public function setTitre3Fr(?string $titre3_fr): self
    {
        $this->titre3_fr = $titre3_fr;

        return $this;
    }

    public function getTitre3Ang(): ?string
    {
        return $this->titre3_ang;
    }

    public function setTitre3Ang(?string $titre3_ang): self
    {
        $this->titre3_ang = $titre3_ang;

        return $this;
    }

    public function getTitre4Fr(): ?string
    {
        return $this->titre4_fr;
    }

    public function setTitre4Fr(?string $titre4_fr): self
    {
        $this->titre4_fr = $titre4_fr;

        return $this;
    }

    public function getTitre4Ang(): ?string
    {
        return $this->titre4_ang;
    }

    public function setTitre4Ang(?string $titre4_ang): self
    {
        $this->titre4_ang = $titre4_ang;

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
     * @return Collection<int, IplanMenus>
     */
    public function getIplanmenus(): Collection
    {
        return $this->iplanmenus;
    }

    public function addIplanmenu(IplanMenus $iplanmenu): self
    {
        if (!$this->iplanmenus->contains($iplanmenu)) {
            $this->iplanmenus->add($iplanmenu);
        }

        return $this;
    }

    public function removeIplanmenu(IplanMenus $iplanmenu): self
    {
        $this->iplanmenus->removeElement($iplanmenu);

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
}
