<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $commentRate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentText = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $commentDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentRate(): ?int
    {
        return $this->commentRate;
    }

    public function setCommentRate(int $commentRate): static
    {
        $this->commentRate = $commentRate;

        return $this;
    }

    public function getCommentText(): ?string
    {
        return $this->commentText;
    }

    public function setCommentText(?string $commentText): static
    {
        $this->commentText = $commentText;

        return $this;
    }

    public function getCommentDate(): ?\DateTimeInterface
    {
        return $this->commentDate;
    }

    public function setCommentDate(\DateTimeInterface $commentDate): static
    {
        $this->commentDate = $commentDate;

        return $this;
    }
}
