<?php
require_once "Person.php";
class Employee extends Person
{
    private $salary;
    private $role;

    public function __construct($name, $lastName, $gender, $age, $phoneNumber, $emailAddress, $salary, $role) {
        parent::__construct(
            $name,
            $lastName,
            $gender,
            $age,
            $phoneNumber,
            $emailAddress
        );
        $this->salary = $salary;
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
        $returnedString .= "Salary: $this->salary usd<br>";
        $returnedString .= "Role: $this->role<br>";
        return $returnedString;
    }
}
