<?php
namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

trait CreatedTrait
{
    #[ORM\Column(type: 'datetime_immutable')]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $createdBy = null;

    #[ORM\PrePersist]
    public function initializeCreatedAt(): void
    {
        if ($this->createdAt === null) {
            $this->createdAt = new DateTimeImmutable();
        }
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): static
    {
        $this->createdBy = $createdBy;
        return $this;
    }
}
