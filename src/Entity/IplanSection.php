<?php

namespace App\Entity;

use App\Repository\IplanSectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IplanSectionRepository::class)]
class IplanSection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paragraphe_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paragraphe_ang = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content_fr = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content_ang = null;

    #[ORM\ManyToMany(targetEntity: Iplanpage::class, mappedBy: 'section')]
    private Collection $iplanpages;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

    #[ORM\ManyToMany(targetEntity: IplanActualite::class, inversedBy: 'iplanSections')]
    private Collection $iplanactualite;

    #[ORM\ManyToOne(inversedBy: 'iplanSections')]
    private ?IplanImage $iplanimage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien_fr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lein_ang = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lien_ang = null;

    public function __construct()
    {
        $this->iplanpages = new ArrayCollection();
        $this->iplanactualite = new ArrayCollection();
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

    public function getTitreFr(): ?string
    {
        return $this->titre_fr;
    }

    public function setTitreFr(?string $titre_fr): self
    {
        $this->titre_fr = $titre_fr;

        return $this;
    }

    public function getTitreAng(): ?string
    {
        return $this->titre_ang;
    }

    public function setTitreAng(?string $titre_ang): self
    {
        $this->titre_ang = $titre_ang;

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

    public function getContentFr(): ?string
    {
        return $this->content_fr;
    }

    public function setContentFr(?string $content_fr): self
    {
        $this->content_fr = $content_fr;

        return $this;
    }

    public function getContentAng(): ?string
    {
        return $this->content_ang;
    }

    public function setContentAng(?string $content_ang): self
    {
        $this->content_ang = $content_ang;

        return $this;
    }

    /**
     * @return Collection<int, Iplanpage>
     */
    public function getIplanpages(): Collection
    {
        return $this->iplanpages;
    }

    public function addIplanpage(Iplanpage $iplanpage): self
    {
        if (!$this->iplanpages->contains($iplanpage)) {
            $this->iplanpages->add($iplanpage);
            $iplanpage->addSection($this);
        }

        return $this;
    }

    public function removeIplanpage(Iplanpage $iplanpage): self
    {
        if ($this->iplanpages->removeElement($iplanpage)) {
            $iplanpage->removeSection($this);
        }

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, IplanActualite>
     */
    public function getIplanactualite(): Collection
    {
        return $this->iplanactualite;
    }

    public function addIplanactualite(IplanActualite $iplanactualite): self
    {
        if (!$this->iplanactualite->contains($iplanactualite)) {
            $this->iplanactualite->add($iplanactualite);
        }

        return $this;
    }

    public function removeIplanactualite(IplanActualite $iplanactualite): self
    {
        $this->iplanactualite->removeElement($iplanactualite);

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

    public function __toString()
    {
        return $this->nom;
    }

    public function getLienFr(): ?string
    {
        return $this->lien_fr;
    }

    public function setLienFr(?string $lien_fr): self
    {
        $this->lien_fr = $lien_fr;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    

    public function getLienAng(): ?string
    {
        return $this->lien_ang;
    }

    public function setLienAng(?string $lien_ang): self
    {
        $this->lien_ang = $lien_ang;

        return $this;
    }
}
