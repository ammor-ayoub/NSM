<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteRepository::class)]
class Note extends BaseEntity
{

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Student $studentId;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private CourseTeacherClass $courseTeacherClassId;

    #[ORM\Column]
    private float $totalNote;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $session;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $coefficient = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    public function getStudentId(): ?Student
    {
        return $this->studentId;
    }

    public function setStudentId(?Student $studentId): static
    {
        $this->studentId = $studentId;

        return $this;
    }

    public function getCourseTeacherClassId(): CourseTeacherClass
    {
        return $this->courseTeacherClassId;
    }

    public function setCourseTeacherClassId(CourseTeacherClass $courseTeacherClassId): static
    {
        $this->courseTeacherClassId = $courseTeacherClassId;

        return $this;
    }

    public function getTotalNote(): float
    {
        return $this->totalNote;
    }

    public function setTotalNote(float $totalNote): static
    {
        $this->totalNote = $totalNote;

        return $this;
    }

    public function getSession(): int
    {
        return $this->session;
    }

    public function setSession(int $session): static
    {
        $this->session = $session;

        return $this;
    }

    public function getCoefficient(): ?int
    {
        return $this->coefficient;
    }

    public function setCoefficient(?int $coefficient): static
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }
}
