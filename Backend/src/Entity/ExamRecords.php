<?php

namespace App\Entity;

use App\Repository\ExamRecordsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamRecordsRepository::class)]
class ExamRecords extends BaseEntity
{
    #[ORM\ManyToOne(inversedBy: 'examRecords')]
    #[ORM\JoinColumn(nullable: false)]
    private Student $studentId;

    #[ORM\Column]
    private float $note;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\ManyToOne(inversedBy: 'examRecords')]
    #[ORM\JoinColumn(nullable: false)]
    private Exam $examId = null;

    public function getStudentId(): Student
    {
        return $this->studentId;
    }

    public function setStudentId(?Student $studentId): static
    {
        $this->studentId = $studentId;

        return $this;
    }

    public function getNote(): float
    {
        return $this->note;
    }

    public function setNote(float $note): static
    {
        $this->note = $note;

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

    public function getExamId(): ?Exam
    {
        return $this->examId;
    }

    public function setExamId(?Exam $examId): static
    {
        $this->examId = $examId;

        return $this;
    }
}
