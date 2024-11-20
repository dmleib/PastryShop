<?php
/**
 * Author: Kierra
 * Date: 11/15/24
 * File: user.class.php
 * Description: This class represents a User
 */

class User
{
    private int $userId;
    private string $passwordHash, $email, $role, $dateCreated;
    private ?string $firstName, $lastName;
    private string $username; // Deirdre added this to declare the username property

    //constructor
    public function __construct(int $userId, string $username, string $passwordHash, string $email, string $role, ?string $firstName, ?string $lastName, string $dateCreated)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->passwordHash = $passwordHash;
        $this->email = $email;
        $this->role = $role;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateCreated = $dateCreated;
    }

// Get user ID
    public function getUserId(): int
    {
        return $this->userId;
    }

// Get username
    public function getUsername(): string
    {
        return $this->username;
    }

//Get Password
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

// Get email
    public function getEmail(): string
    {
        return $this->email;
    }

//Get Role
    public function getRole(): string
    {
        return $this->role;
    }

//Get First name
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

//Get Last name
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

//Get date created
    public function getDateCreated(): string
    {
        return $this->dateCreated;
    }

//Set username
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

//Set Password Hash
    public function setPasswordHash(string $password): void
    {
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

//Set email
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

//Set Role
    public function setRole(string $role): void
    {
        if (in_array($role, ['admin', 'employee', 'customer'])) {
            $this->role = $role;
        } else {
            throw new Exception("Invalid role provided.");
        }
    }

//Set First Name
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

//Set Last Name
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

//Verify Password Method
    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->passwordHash);
    }
}

?>








