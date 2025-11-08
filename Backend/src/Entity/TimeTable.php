<?php

namespace App\Entity;

use App\Repository\TimeTableRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimeTableRepository::class)]
class TimeTable extends BaseEntity
{
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private CourseTeacherClass $courseTeacherClassId;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private \DateTime $startTime;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private \DateTime $endTime;

    #[ORM\Column(type: Types::SMALLINT)]
    private int $dayOfWeek;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $room = null;

    public function getCourseTeacherClassId(): CourseTeacherClass
    {
        return $this->courseTeacherClassId;
    }

    public function setCourseTeacherClassId(CourseTeacherClass $courseTeacherClassId): static
    {
        $this->courseTeacherClassId = $courseTeacherClassId;

        return $this;
    }

    public function getStartTime(): \DateTime
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTime $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): \DateTime
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTime $endTime): static
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getDayOfWeek(): int
    {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek(int $dayOfWeek): static
    {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    public function getRoom(): ?string
    {
        return $this->room;
    }

    public function setRoom(?string $room): static
    {
        $this->room = $room;

        return $this;
    }
}
