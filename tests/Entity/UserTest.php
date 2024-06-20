<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetSetEmail()
    {
        $user = new User();
        $email = 'test@example.com';

        $user->setEmail($email);

        $this->assertSame($email, $user->getEmail());
    }

    public function testGetSetFirstName()
    {
        $user = new User();
        $firstName = 'John';

        $user->setFirstName($firstName);

        $this->assertSame($firstName, $user->getFirstName());
    }

    public function testGetSetLastName()
    {
        $user = new User();
        $lastName = 'Doe';

        $user->setLastName($lastName);

        $this->assertSame($lastName, $user->getLastName());
    }

    public function testGetSetPhoneNumber()
    {
        $user = new User();
        $phoneNumber = '1234567890';

        $user->setPhoneNumber($phoneNumber);

        $this->assertSame($phoneNumber, $user->getPhoneNumber());
    }

    public function testGetSetCutterDescription()
    {
        $user = new User();
        $description = 'Experienced hairdresser';

        $user->setCutterDescription($description);

        $this->assertSame($description, $user->getCutterDescription());
    }

    public function testGetSetCutterRank()
    {
        $user = new User();
        $rank = 4.5;

        $user->setCutterRank($rank);

        $this->assertSame($rank, $user->getCutterRank());
    }

    public function testGetSetProfilePicture()
    {
        $user = new User();
        $profilePicture = 'path/to/profile/pic.jpg';

        $user->setProfilePicture($profilePicture);

        $this->assertSame($profilePicture, $user->getProfilePicture());
    }

    public function testGetSetCutterStatus()
    {
        $user = new User();
        $status = 'Active';

        $user->setCutterStatus($status);

        $this->assertSame($status, $user->getCutterStatus());
    }

    public function testGetSetCutterCutsDone()
    {
        $user = new User();
        $cutsDone = 150;

        $user->setCutterCutsDone($cutsDone);

        $this->assertSame($cutsDone, $user->getCutterCutsDone());
    }

    public function testGetSetCutterCuts()
    {
        $user = new User();
        $cuts = ['cut1', 'cut2', 'cut3'];

        $user->setCutterCuts($cuts);

        $this->assertSame($cuts, $user->getCutterCuts());
    }

    public function testGetSetPassword()
    {
        $user = new User();
        $password = 'password123';

        $user->setPassword($password);

        $this->assertSame($password, $user->getPassword());
    }

    public function testGetSetRoles()
    {
        $user = new User();
        $roles = ['ROLE_ADMIN'];

        $user->setRoles($roles);

        $this->assertContains('ROLE_ADMIN', $user->getRoles());
        $this->assertContains('ROLE_USER', $user->getRoles());
        $this->assertCount(2, $user->getRoles());
    }

    public function testEraseCredentials()
    {
        $user = new User();

        // Assuming you have some sensitive data to clear
        // $user->setPlainPassword('plainPassword');
        // $user->eraseCredentials();

        // $this->assertNull($user->getPlainPassword());
    }

    public function testGetUserIdentifier()
    {
        $user = new User();
        $email = 'test@example.com';

        $user->setEmail($email);

        $this->assertSame($email, $user->getUserIdentifier());
    }
}
