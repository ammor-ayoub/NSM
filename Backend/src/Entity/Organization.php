<?php

namespace App\Entity;

use App\Enum\PlanType;
use App\Repository\OrganizationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganizationRepository::class)]
class Organization extends BaseEntity
{

    #[ORM\Column(length: 60)]
    private ?string $name = null;

    #[ORM\Column(enumType: PlanType::class)]
    private ?PlanType $plan = null;

    /**
     * @var Collection<int, Site>
     */
    #[ORM\OneToMany(targetEntity: Site::class, mappedBy: 'organisation')]
    private Collection $sites;

    public function __construct()
    {
        $this->sites = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPlan(): ?PlanType
    {
        return $this->plan;
    }

    public function setPlan(PlanType $plan): static
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * @return Collection<int, Site>
     */
    public function getSites(): Collection
    {
        return $this->sites;
    }

    public function addSite(Site $site): static
    {
        if (!$this->sites->contains($site)) {
            $this->sites->add($site);
            $site->setOrganisation($this);
        }

        return $this;
    }

    public function removeSite(Site $site): static
    {
        if ($this->sites->removeElement($site)) {
            // set the owning side to null (unless already changed)
            if ($site->getOrganisation() === $this) {
                $site->setOrganisation(null);
            }
        }

        return $this;
    }
}
