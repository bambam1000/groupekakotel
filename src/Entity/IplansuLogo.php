<?php

namespace App\Entity;

use App\Repository\IplansuLogoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplansuLogoRepository::class)]
class IplansuLogo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'iplansuLogos')]
    private ?IplansuImage $image = null;

    #[ORM\OneToMany(mappedBy: 'logo', targetEntity: IplansuHeader::class)]
    private Collection $iplansuHeaders;

    public function __construct()
    {
        $this->iplansuHeaders = new ArrayCollection();
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

    public function getImage(): ?IplansuImage
    {
        return $this->image;
    }

    public function setImage(?IplansuImage $image): self
    {
        $this->image = $image;

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
            $iplansuHeader->setLogo($this);
        }

        return $this;
    }

    public function removeIplansuHeader(IplansuHeader $iplansuHeader): self
    {
        if ($this->iplansuHeaders->removeElement($iplansuHeader)) {
            // set the owning side to null (unless already changed)
            if ($iplansuHeader->getLogo() === $this) {
                $iplansuHeader->setLogo(null);
            }
        }

        return $this;
    }
}
