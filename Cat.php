<?php

require_once "Animal.php";
class Cat extends Animal
{
    private $tailLength;

    public function __construct($name, $age, $race, $weight, $gender, $tailLength) {
        parent::__construct($name, $age, $race, $weight, $gender);
        $this->tailLength = $tailLength;
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
        $returnedString .= "Tail Length: $this->tailLength cm<br>";
        return $returnedString;
    }
}
