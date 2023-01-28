<?php

abstract class Person
{
    protected $name;
    protected $lastName;
    protected $gender;
    protected $age;
    protected $phoneNumber;
    protected $emailAddress;

    public function __construct($name, $lastName, $gender, $age, $phoneNumber, $emailAddress) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->age = $age;
        $this->phoneNumber = $phoneNumber;
        $this->emailAddress = $emailAddress;
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
        return "Name: $this->name<br>Last name: $this->lastName<br>Gender: $this->gender<br>Age: $this->age y.o.<br>Phone number: +48 $this->phoneNumber<br>Email address: $this->emailAddress<br>";
    }
}
