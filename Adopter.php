<?php

class Adopter extends Person
{
    private $adoptedAnimals = [];

    public function __construct($name, $lastName, $gender, $age, $phoneNumber, $emailAddress) {
        parent::__construct($name, $lastName, $gender, $age, $phoneNumber, $emailAddress);
    }

    public function __toString()
    {
        $returnedString = parent::__toString();
        if (count($this->adoptedAnimals) > 0) {
            $returnedString .= "Adopted animals: ";
            foreach ($this->adoptedAnimals as $animal) {
                $returnedString .= "<li>$animal->name</li>";
            }
        } else {
            $returnedString .= "This person has not adopted any animal";
        }
        return $returnedString;
    }

    public function &__get($variable)
    {
        return $this->$variable;
    }

    public function __set($variable, $value)
    {
        $this->$variable = $value;
    }
}
