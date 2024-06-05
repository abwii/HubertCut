<?php

namespace App\Entity;

use App\Repository\CutRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CutRepository::class)]
class Cut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cutName = null;

    #[ORM\Column]
    private ?float $cutPrice = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $cutDescription = null;

    #[ORM\Column(length: 10)]
    private ?string $cutSex = null;

    #[ORM\Column(length: 255)]
    private ?string $cutLength = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCutName(): ?string
    {
        return $this->cutName;
    }

    public function setCutName(string $cutName): static
    {
        $this->cutName = $cutName;

        return $this;
    }

    public function getCutPrice(): ?float
    {
        return $this->cutPrice;
    }

    public function setCutPrice(float $cutPrice): static
    {
        $this->cutPrice = $cutPrice;

        return $this;
    }

    public function getCutDescription(): ?string
    {
        return $this->cutDescription;
    }

    public function setCutDescription(string $cutDescription): static
    {
        $this->cutDescription = $cutDescription;

        return $this;
    }

    public function getCutSex(): ?string
    {
        return $this->cutSex;
    }

    public function setCutSex(string $cutSex): static
    {
        $this->cutSex = $cutSex;

        return $this;
    }

    public function getCutLength(): ?string
    {
        return $this->cutLength;
    }

    public function setCutLength(string $cutLength): static
    {
        $this->cutLength = $cutLength;

        return $this;
    }
}
