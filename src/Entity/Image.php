<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\person", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $person;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\clan", inversedBy="images")
     */
    private $clan;

    /**
     * @ORM\Column(type="blob")
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $created_by;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_date;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $modified_by;

    /**
     * @ORM\Column(type="datetime")
     */
    private $modified_date;

    public function __construct()
    {
        $this->clan = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerson(): ?person
    {
        return $this->person;
    }

    public function setPerson(?person $person): self
    {
        $this->person = $person;

        return $this;
    }

    /**
     * @return Collection|clan[]
     */
    public function getClan(): Collection
    {
        return $this->clan;
    }

    public function addClan(clan $clan): self
    {
        if (!$this->clan->contains($clan)) {
            $this->clan[] = $clan;
        }

        return $this;
    }

    public function removeClan(clan $clan): self
    {
        if ($this->clan->contains($clan)) {
            $this->clan->removeElement($clan);
        }

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedBy(): ?person
    {
        return $this->created_by;
    }

    public function setCreatedBy(person $created_by): self
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->created_date;
    }

    public function setCreatedDate(\DateTimeInterface $created_date): self
    {
        $this->created_date = $created_date;

        return $this;
    }

    public function getModifiedBy(): ?person
    {
        return $this->modified_by;
    }

    public function setModifiedBy(person $modified_by): self
    {
        $this->modified_by = $modified_by;

        return $this;
    }

    public function getModifiedDate(): ?\DateTimeInterface
    {
        return $this->modified_date;
    }

    public function setModifiedDate(\DateTimeInterface $modified_date): self
    {
        $this->modified_date = $modified_date;

        return $this;
    }
}
