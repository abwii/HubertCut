<?php

namespace App\Entity;

use App\Repository\RdvRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RdvRepository::class)]
class Rdv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $rdvDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rdvStatus = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRdvDate(): ?\DateTimeInterface
    {
        return $this->rdvDate;
    }

    public function setRdvDate(\DateTimeInterface $rdvDate): static
    {
        $this->rdvDate = $rdvDate;

        return $this;
    }

    public function getRdvStatus(): ?string
    {
        return $this->rdvStatus;
    }

    public function setRdvStatus(?string $rdvStatus): static
    {
        $this->rdvStatus = $rdvStatus;

        return $this;
    }
}
