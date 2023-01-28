<?php

abstract class Animal
{
    protected $name;
    protected $age;
    protected $race;
    protected $weight;
    protected $gender;

    public function __construct($name, $age, $race, $weight, $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->race = $race;
        $this->weight = $weight;
        $this->gender = $gender;
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
        return "Name: $this->name<br>Age: $this->age y.o.<br>Race: $this->race<br>Weight: $this->weight kg<br>Gender: $this->gender<br>";
    }
}
