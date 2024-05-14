<?php

namespace App\Entity;

use App\Repository\BillRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BillRepository::class)]
class Bill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $billPrice = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $billDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $billStatus = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBillPrice(): ?float
    {
        return $this->billPrice;
    }

    public function setBillPrice(float $billPrice): static
    {
        $this->billPrice = $billPrice;

        return $this;
    }

    public function getBillDate(): ?\DateTimeInterface
    {
        return $this->billDate;
    }

    public function setBillDate(\DateTimeInterface $billDate): static
    {
        $this->billDate = $billDate;

        return $this;
    }

    public function getBillStatus(): ?string
    {
        return $this->billStatus;
    }

    public function setBillStatus(?string $billStatus): static
    {
        $this->billStatus = $billStatus;

        return $this;
    }
}
