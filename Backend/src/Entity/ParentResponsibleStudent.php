<?php

namespace App\Entity;

use App\Repository\ParentResponsibleStudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParentResponsibleStudentRepository::class)]
class ParentResponsibleStudent extends BaseEntity
{

    #[ORM\ManyToOne(inversedBy: 'parentsResponsibleStudent')]
    #[ORM\JoinColumn(nullable: false)]
    private Student $student;

    #[ORM\Column]
    private bool $isMainResponsibleStudent = false;

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }

    public function isMainResponsibleStudent(): bool
    {
        return $this->isMainResponsibleStudent;
    }

    public function setIsMainResponsibleStudent(bool $isMainResponsibleStudent): static
    {
        $this->isMainResponsibleStudent = $isMainResponsibleStudent;

        return $this;
    }
}
