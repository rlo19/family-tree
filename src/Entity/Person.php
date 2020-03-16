<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $middle_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $work;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $father;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $mother;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $spouse;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $clans;

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

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone_no;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="person_id", orphanRemoval=true)
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middle_name;
    }

    public function setMiddleName(string $middle_name): self
    {
        $this->middle_name = $middle_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getWork(): ?string
    {
        return $this->work;
    }

    public function setWork(?string $work): self
    {
        $this->work = $work;

        return $this;
    }

    public function getFather(): ?int
    {
        return $this->father;
    }

    public function setFather(?int $father): self
    {
        $this->father = $father;

        return $this;
    }

    public function getMother(): ?int
    {
        return $this->mother;
    }

    public function setMother(?int $mother): self
    {
        $this->mother = $mother;

        return $this;
    }

    public function getSpouse(): ?int
    {
        return $this->spouse;
    }

    public function setSpouse(?int $spouse): self
    {
        $this->spouse = $spouse;

        return $this;
    }

    public function getClans(): ?string
    {
        return $this->clans;
    }

    public function setClans(string $clans): self
    {
        $this->clans = $clans;

        return $this;
    }

    public function getCreatedBy(): ?int
    {
        return $this->created_by;
    }

    public function setCreatedBy(int $created_by): self
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

    public function getModifiedBy(): ?int
    {
        return $this->modified_by;
    }

    public function setModifiedBy(int $modified_by): self
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNo(): ?int
    {
        return $this->phone_no;
    }

    public function setPhoneNo(?string $phone_no): self
    {
        $this->phone_no = $phone_no;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setPerson($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getPerson() === $this) {
                $image->setPerson(null);
            }
        }

        return $this;
    }
}
