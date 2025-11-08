<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait BlameableTrait
{
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $createdBy = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $updatedBy = null;

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): static
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy): static
    {
        $this->updatedBy = $updatedBy;
        return $this;
    }
}
