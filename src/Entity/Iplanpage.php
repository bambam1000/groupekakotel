<?php

namespace App\Entity;

use App\Repository\IplanpageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplanpageRepository::class)]
class Iplanpage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToMany(targetEntity: IplanSection::class, inversedBy: 'iplanpages')]
    private Collection $section;

    public function __construct()
    {
        $this->section = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, IplanSection>
     */
    public function getSection(): Collection
    {
        return $this->section;
    }

    public function addSection(IplanSection $section): self
    {
        if (!$this->section->contains($section)) {
            $this->section->add($section);
        }

        return $this;
    }

    public function removeSection(IplanSection $section): self
    {
        $this->section->removeElement($section);

        return $this;
    }
}
