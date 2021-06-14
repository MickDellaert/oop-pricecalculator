<?php
declare(strict_types=1);

class Customer
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private int $group_id;
    private int $fixed_discount;
    private int $variable_discount;

    public function __construct(int $id, string $firstname, string $lastname,int $group_id, int $fixed_discount, int $variable_discount)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->group_id = $group_id;
        $this->fixed_discount = $fixed_discount;
        $this->variable_discount = $variable_discount;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getGroupId(): int
    {
        return $this->group_id;
    }

    public function getFixedDiscount(): int
    {
        return $this->fixed_discount;
    }

    public function getVariableDiscount(): int
    {
        return $this->variable_discount;
    }
}