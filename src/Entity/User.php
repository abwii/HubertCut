<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 20)]
    private ?string $phoneNumber = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $cutterDescription = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $cutterRank = null;

    #[ORM\Column(nullable: true)]
    private ?string $profilePicture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cutterStatus = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $cutterCutsDone = null;

    #[ORM\ManyToMany(targetEntity: Cut::class)]
    private Collection $cutterCuts;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $userCoordinatesX = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $userCoordinatesY = null;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $rdvComment = null;

    public function __construct()
    {
        $this->cutterCuts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getCutterDescription(): ?string
    {
        return $this->cutterDescription;
    }

    public function setCutterDescription(?string $cutterDescription): static
    {
        $this->cutterDescription = $cutterDescription;

        return $this;
    }

    public function getCutterRank(): ?float
    {
        return $this->cutterRank;
    }

    public function setCutterRank(?float $cutterRank): static
    {
        $this->cutterRank = $cutterRank;

        return $this;
    }

    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    public function setProfilePicture(?string $profilePicture): static
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    public function getCutterStatus(): ?string
    {
        return $this->cutterStatus;
    }

    public function setCutterStatus(?string $cutterStatus): static
    {
        $this->cutterStatus = $cutterStatus;

        return $this;
    }

    public function getCutterCutsDone(): ?int
    {
        return $this->cutterCutsDone;
    }

    public function setCutterCutsDone(?int $cutterCutsDone): static
    {
        $this->cutterCutsDone = $cutterCutsDone;

        return $this;
    }

    /**
     * @return Collection<int, Cut>
     */
    public function getCutterCuts(): Collection
    {
        return $this->cutterCuts;
    }

    public function addCutterCut(Cut $cut): static
    {
        if (!$this->cutterCuts->contains($cut)) {
            $this->cutterCuts->add($cut);
        }

        return $this;
    }

    public function removeCutterCut(Cut $cut): static
    {
        $this->cutterCuts->removeElement($cut);

        return $this;
    }

    public function getUserCoordinatesX(): ?float
    {
        return $this->userCoordinatesX;
    }

    public function setUserCoordinatesX(?float $userCoordinatesX): static
    {
        $this->userCoordinatesX = $userCoordinatesX;

        return $this;
    }

    public function getUserCoordinatesY(): ?float
    {
        return $this->userCoordinatesY;
    }

    public function setUserCoordinatesY(?float $userCoordinatesY): static
    {
        $this->userCoordinatesY = $userCoordinatesY;

        return $this;
    }

    public function getRdvComment(): ?string
    {
        return $this->rdvComment;
    }

    public function setRdvComment(?string $rdvComment): static
    {
        $this->rdvComment = $rdvComment;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param array<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // Clear temporary, sensitive data here
    }
}
