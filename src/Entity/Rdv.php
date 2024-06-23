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

    #[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $rdvCoordinatesX = null;

    #[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $rdvCoordinatesY = null;

    #[ORM\ManyToOne(targetEntity: Cut::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cut $rdvCut = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $rdvUser = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $rdvCutter = null;

    #[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $rdvPrice = null;

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

    public function getRdvCoordinatesX(): ?float
    {
        return $this->rdvCoordinatesX;
    }

    public function setRdvCoordinatesX(?float $rdvCoordinatesX): static
    {
        $this->rdvCoordinatesX = $rdvCoordinatesX;

        return $this;
    }

    public function getRdvCoordinatesY(): ?float
    {
        return $this->rdvCoordinatesY;
    }

    public function setRdvCoordinatesY(?float $rdvCoordinatesY): static
    {
        $this->rdvCoordinatesY = $rdvCoordinatesY;

        return $this;
    }

    public function getRdvCut(): ?Cut
    {
        return $this->rdvCut;
    }

    public function setRdvCut(?Cut $rdvCut): static
    {
        $this->rdvCut = $rdvCut;

        return $this;
    }

    public function getRdvUser(): ?User
    {
        return $this->rdvUser;
    }

    public function setRdvUser(?User $rdvUser): static
    {
        $this->rdvUser = $rdvUser;

        return $this;
    }

    public function getRdvCutter(): ?User
    {
        return $this->rdvCutter;
    }

    public function setRdvCutter(?User $rdvCutter): static
    {
        $this->rdvCutter = $rdvCutter;

        return $this;
    }

    public function getRdvPrice(): ?float
    {
        return $this->rdvPrice;
    }

    public function setRdvPrice(?float $rdvPrice): static
    {
        $this->rdvPrice = $rdvPrice;

        return $this;
    }
}
