<?php
declare(strict_types=1);

class CustomerLoader
{
    private $customers = [];

    public function __construct()
    {
        $json = json_decode(file_get_contents('customers.json'), true);
        foreach ($json AS $customerJson) {
            $this->customers[$customerJson['id']] = new Customer($customerJson['id'], $customerJson['name'], new Group);
        }
    }

    public function loadById(int $customerId) : Customer {
        return $this->customers[$customerId];
    }

    public function loadCustomers() : array
    {
        return $this->customers;
    }
}