<?php

namespace App\Entity;

use App\Repository\IplansuHeaderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplansuHeaderRepository::class)]
class IplansuHeader
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\ManyToMany(targetEntity: IplansuMenus::class, inversedBy: 'iplansuHeaders')]
    private Collection $menus;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'iplansuHeaders')]
    private ?IplansuLogo $logo = null;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLogo(): ?IplansuLogo
    {
        return $this->logo;
    }

    public function setLogo(?IplansuLogo $logo): self
    {
        $this->logo = $logo;

        return $this;
    }
}
