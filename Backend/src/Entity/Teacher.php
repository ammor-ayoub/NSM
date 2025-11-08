<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher extends BaseEntity
{
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private User $userId;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $hireDate = null;

    #[ORM\Column(length: 10)]
    private string $phone;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $courseSpeciality = null;

    public function getUserId(): User
    {
        return $this->userId;
    }

    public function setUserId(User $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getHireDate(): ?\DateTimeImmutable
    {
        return $this->hireDate;
    }

    public function setHireDate(?\DateTimeImmutable $hireDate): static
    {
        $this->hireDate = $hireDate;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCourseSpeciality(): ?string
    {
        return $this->courseSpeciality;
    }

    public function setCourseSpeciality(?string $courseSpeciality): static
    {
        $this->courseSpeciality = $courseSpeciality;

        return $this;
    }
}
