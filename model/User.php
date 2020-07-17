<?php
declare(strict_types=1);

class User
{
    private int $id;
    private string $email;
    private string $password;
    private string $username;
    private string $description;

    public function __construct(string $email, string $password, string $username, string $description='')
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function load(int $id) {
        // do a query to fetch the data
        // set all the fields
    }

    public function save() {
        //save the data in the database
    }
}
$user = new User('koen@becode.org');
$userTim = new User('tim@becode.org');
echo $user->getEmail();