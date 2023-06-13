<?php

namespace App\Entity;

use App\Repository\IplanlogoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplanlogoRepository::class)]
class Iplanlogo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'iplanlogos')]
    private ?IplanImage $iplanimage = null;

    #[ORM\OneToMany(mappedBy: 'iplanlogo', targetEntity: Iplanheader::class)]
    private Collection $iplanheaders;

    public function __construct()
    {
        $this->iplanheaders = new ArrayCollection();
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

    public function getIplanimage(): ?IplanImage
    {
        return $this->iplanimage;
    }

    public function setIplanimage(?IplanImage $iplanimage): self
    {
        $this->iplanimage = $iplanimage;

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
            $iplanheader->setIplanlogo($this);
        }

        return $this;
    }

    public function removeIplanheader(Iplanheader $iplanheader): self
    {
        if ($this->iplanheaders->removeElement($iplanheader)) {
            // set the owning side to null (unless already changed)
            if ($iplanheader->getIplanlogo() === $this) {
                $iplanheader->setIplanlogo(null);
            }
        }

        return $this;
    }
}
