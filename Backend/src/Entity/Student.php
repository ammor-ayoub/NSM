<?php

namespace App\Entity;

use App\Enum\StudentStatusType;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student extends BaseEntity
{
    /**
     * @var Collection<int, ParentResponsibleStudent>
     */
    #[ORM\OneToMany(targetEntity: ParentResponsibleStudent::class, mappedBy: 'student')]
    private Collection $parentsResponsibleStudent;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private User $userId;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $enrollmentDate = null;

    #[ORM\Column(enumType: StudentStatusType::class)]
    private ?StudentStatusType $status = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateOfBirth = null;

    /**
     * @var Collection<int, ExamRecords>
     */
    #[ORM\OneToMany(targetEntity: ExamRecords::class, mappedBy: 'studentId')]
    private Collection $examRecords;

    public function __construct()
    {
        $this->parentsResponsibleStudent = new ArrayCollection();
        $this->examRecords = new ArrayCollection();
    }

    /**
     * @return Collection<int, ParentResponsibleStudent>
     */
    public function getParentsResponsibleStudent(): Collection
    {
        return $this->parentsResponsibleStudent;
    }

    public function addParentsResponsibleStudent(ParentResponsibleStudent $parentsResponsibleStudent): static
    {
        if (!$this->parentsResponsibleStudent->contains($parentsResponsibleStudent)) {
            $this->parentsResponsibleStudent->add($parentsResponsibleStudent);
            $parentsResponsibleStudent->setStudent($this);
        }

        return $this;
    }

    public function removeParentsResponsibleStudent(ParentResponsibleStudent $parentsResponsibleStudent): static
    {
        if ($this->parentsResponsibleStudent->removeElement($parentsResponsibleStudent)) {
            // set the owning side to null (unless already changed)
            if ($parentsResponsibleStudent->getStudent() === $this) {
                $parentsResponsibleStudent->setStudent(null);
            }
        }

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getEnrollmentDate(): ?\DateTimeImmutable
    {
        return $this->enrollmentDate;
    }

    public function setEnrollmentDate(\DateTimeImmutable $enrollmentDate): static
    {
        $this->enrollmentDate = $enrollmentDate;

        return $this;
    }

    public function getStatus(): ?StudentStatusType
    {
        return $this->status;
    }

    public function setStatus(StudentStatusType $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeImmutable $dateOfBirth): static
    {
        $this->dateOfBirth = $dateOfBirth;

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
            $examRecord->setStudentId($this);
        }

        return $this;
    }

    public function removeExamRecord(ExamRecords $examRecord): static
    {
        if ($this->examRecords->removeElement($examRecord)) {
            // set the owning side to null (unless already changed)
            if ($examRecord->getStudentId() === $this) {
                $examRecord->setStudentId(null);
            }
        }

        return $this;
    }
}
