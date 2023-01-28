<?php

class Volunteer extends Person
{
    private $role;

    public function __construct($name, $lastName, $gender, $age, $phoneNumber, $emailAddress, $role) {
        parent::__construct($name, $lastName, $gender, $age, $phoneNumber, $emailAddress);
        $this->role = $role;
    }

    public function __get($variable)
    {
        return $this->$variable;
    }

    public function __set($variable, $value)
    {
        $this->$variable = $value;
    }

    public function __toString()
    {
        $returnedString = parent::__toString();
        $returnedString .= "Role: $this->role<br>";
        return $returnedString;
    }
}
