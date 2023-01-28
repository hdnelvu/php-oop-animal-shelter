<?php

require_once "Animal.php";
class Dog extends Animal
{
    private $tailLength;
    private $skills = [];

    public function __construct($name, $age, $race, $weight, $gender, $tailLength, $skills) {
        parent::__construct($name, $age, $race, $weight, $gender);
        $this->tailLength = $tailLength;
        $this->skills = $skills;
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
        $returnedString .= "Tail length: $this->tailLength cm<br>";
        if (count($this->skills) > 0) {
            $returnedString .= "Skills: ";
            foreach ($this->skills as $skill) {
                $returnedString .= "<li>$skill</li>";
            }
        }
        return $returnedString;
    }
}
