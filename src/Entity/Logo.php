<?php

namespace App\Entity;

use App\Repository\LogoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogoRepository::class)]
class Logo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'logo', targetEntity: Header::class)]
    private Collection $headers;

    #[ORM\OneToMany(mappedBy: 'logo', targetEntity: Footer::class)]
    private Collection $footers;

    public function __construct()
    {
        $this->headers = new ArrayCollection();
        $this->footers = new ArrayCollection();
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
            $header->setLogo($this);
        }

        return $this;
    }

    public function removeHeader(Header $header): self
    {
        if ($this->headers->removeElement($header)) {
            // set the owning side to null (unless already changed)
            if ($header->getLogo() === $this) {
                $header->setLogo(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @return Collection<int, Footer>
     */
    public function getFooters(): Collection
    {
        return $this->footers;
    }

    public function addFooter(Footer $footer): self
    {
        if (!$this->footers->contains($footer)) {
            $this->footers->add($footer);
            $footer->setLogo($this);
        }

        return $this;
    }

    public function removeFooter(Footer $footer): self
    {
        if ($this->footers->removeElement($footer)) {
            // set the owning side to null (unless already changed)
            if ($footer->getLogo() === $this) {
                $footer->setLogo(null);
            }
        }

        return $this;
    }
}
