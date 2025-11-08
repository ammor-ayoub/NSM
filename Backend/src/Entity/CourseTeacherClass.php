<?php

namespace App\Entity;

use App\Repository\CourseTeacherClassRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseTeacherClassRepository::class)]
class CourseTeacherClass extends BaseEntity
{
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Course $courseId;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Teacher $teacherId;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ClassRoom $classGroupId;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $sessionYear = null;

    #[ORM\Column(length: 50)]
    private string $title;

    public function getCourseId(): Course
    {
        return $this->courseId;
    }

    public function setCourseId(Course $courseId): static
    {
        $this->courseId = $courseId;

        return $this;
    }

    public function getTeacherId(): Teacher
    {
        return $this->teacherId;
    }

    public function setTeacherId(Teacher $teacherId): static
    {
        $this->teacherId = $teacherId;

        return $this;
    }

    public function getClassGroupId(): ClassRoom
    {
        return $this->classGroupId;
    }

    public function setClassGroupId(ClassRoom $classGroupId): static
    {
        $this->classGroupId = $classGroupId;

        return $this;
    }

    public function getSessionYear(): ?string
    {
        return $this->sessionYear;
    }

    public function setSessionYear(?string $sessionYear): static
    {
        $this->sessionYear = $sessionYear;

        return $this;
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
}
