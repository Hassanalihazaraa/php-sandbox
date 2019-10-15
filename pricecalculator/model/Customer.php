<?php
declare(strict_types=1);

class Group {}
class Customer
{
    private $id;
    private $name;
    private $group;

    function __construct(int $id, string $name, Group $group)
    {
        $this->id = $id;
        $this->name = $name;
        $this->group = $group;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }
}