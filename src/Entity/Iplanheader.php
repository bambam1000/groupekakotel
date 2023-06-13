<?php

namespace App\Entity;

use App\Repository\IplanheaderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplanheaderRepository::class)]
class Iplanheader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contact = null;

    #[ORM\ManyToOne(inversedBy: 'iplanheaders')]
    private ?Iplanlogo $iplanlogo = null;

    #[ORM\ManyToMany(targetEntity: IplanMenus::class, inversedBy: 'iplanheaders')]
    private Collection $iplanmenus;

    #[ORM\ManyToOne(inversedBy: 'iplanheaders')]
    private ?IplanImage $logoIplan = null;

    public function __construct()
    {
        $this->iplanmenus = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getIplanlogo(): ?Iplanlogo
    {
        return $this->iplanlogo;
    }

    public function setIplanlogo(?Iplanlogo $iplanlogo): self
    {
        $this->iplanlogo = $iplanlogo;

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

    public function getLogoIplan(): ?IplanImage
    {
        return $this->logoIplan;
    }

    public function setLogoIplan(?IplanImage $logoIplan): self
    {
        $this->logoIplan = $logoIplan;

        return $this;
    }
}
