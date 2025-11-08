<?php

namespace App\Entity;

use App\Repository\ResponsibleStudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponsibleStudentRepository::class)]
class ResponsibleStudent extends BaseEntity
{
    #[ORM\Column(length: 10)]
    private ?string $phone = null;

    #[ORM\Column(length: 20)]
    private ?string $relationType = null;

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRelationType(): ?string
    {
        return $this->relationType;
    }

    public function setRelationType(string $relationType): static
    {
        $this->relationType = $relationType;

        return $this;
    }
}
