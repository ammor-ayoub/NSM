<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteRepository::class)]
class Site extends BaseEntity
{
    #[ORM\Column(length: 60)]
    private string $name;

    #[ORM\Column(length: 10)]
    private string $reference;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $phone = null;

    #[ORM\ManyToOne(inversedBy: 'sites')]
    private ?Organization $organisation = null;

    /**
     * @var Collection<int, ClassRoom>
     */
    #[ORM\OneToMany(targetEntity: ClassRoom::class, mappedBy: 'site', orphanRemoval: true)]
    private Collection $classRooms;

    public function __construct()
    {
        $this->classRooms = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getOrganisation(): ?Organization
    {
        return $this->organisation;
    }

    public function setOrganisation(?Organization $organisation): static
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * @return Collection<int, ClassRoom>
     */
    public function getClassRooms(): Collection
    {
        return $this->classRooms;
    }

    public function addClassRoom(ClassRoom $classRoom): static
    {
        if (!$this->classRooms->contains($classRoom)) {
            $this->classRooms->add($classRoom);
            $classRoom->setSite($this);
        }

        return $this;
    }

    public function removeClassRoom(ClassRoom $classRoom): static
    {
        if ($this->classRooms->removeElement($classRoom)) {
            // set the owning side to null (unless already changed)
            if ($classRoom->getSite() === $this) {
                $classRoom->setSite(null);
            }
        }

        return $this;
    }
}
