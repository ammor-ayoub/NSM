<?php

namespace App\Entity;

use App\Repository\ExamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamRepository::class)]
class Exam extends BaseEntity
{
    #[ORM\Column(length: 30)]
    private string $title;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $typeExam = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private \DateTimeImmutable $dateExam;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private CourseTeacherClass $courseTeacherClassId;

    /**
     * @var Collection<int, ExamRecords>
     */
    #[ORM\OneToMany(targetEntity: ExamRecords::class, mappedBy: 'examId')]
    private Collection $examRecords;

    public function __construct()
    {
        $this->examRecords = new ArrayCollection();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getTypeExam(): ?string
    {
        return $this->typeExam;
    }

    public function setTypeExam(?string $typeExam): static
    {
        $this->typeExam = $typeExam;

        return $this;
    }

    public function getDateExam(): \DateTimeImmutable
    {
        return $this->dateExam;
    }

    public function setDateExam(\DateTimeImmutable $dateExam): static
    {
        $this->dateExam = $dateExam;

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

    /**
     * @return Collection<int, ExamRecords>
     */
    public function getExamRecords(): Collection
    {
        return $this->examRecords;
    }

    public function addExamRecord(ExamRecords $examRecord): static
    {
        if (!$this->examRecords->contains($examRecord)) {
            $this->examRecords->add($examRecord);
            $examRecord->setExamId($this);
        }

        return $this;
    }

    public function removeExamRecord(ExamRecords $examRecord): static
    {
        if ($this->examRecords->removeElement($examRecord)) {
            // set the owning side to null (unless already changed)
            if ($examRecord->getExamId() === $this) {
                $examRecord->setExamId(null);
            }
        }

        return $this;
    }
}
