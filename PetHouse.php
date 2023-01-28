<?php
class PetHouse
{
    private static $counter = 0;
    private $animals = [];
    private $capacity;
    private $material;
    private $blanketColor;
    private $petHouseNumber;

    public function __construct($capacity, $material, $blanketColor)
    {
        $this->capacity = $capacity;
        $this->material = $material;
        $this->blanketColor = $blanketColor;
        self::$counter++;
        $this->petHouseNumber = self::$counter;
    }

    public function addAnimal($animal)
    {
        if (count($this->animals) > 0) {
            if (get_class($this->animals[0]) != get_class($animal)) {
                return false;
            }
        }

        foreach ($this->animals as $a) {
            if ($a == $animal) {
                return false;
            }
        }

        if (count($this->animals) < $this->capacity) {
            array_push($this->animals, $animal);
            return true;
        } else {
            return false;
        }
    }

    public function deleteAnimal($animal)
    {
        foreach ($this->animals as $key => $a) {
            if ($a == $animal) {
                array_splice($this->animals, $key, 1);
                return true;
            }
        }
        return false;
    }

    public function &__get($variable)
    {
        return $this->$variable;
    }

    public function __set($variable, $value)
    {
        $this->$variable = $value;
    }

    public function __toString()
    {
        $returnedString = "Capacity: $this->capacity pets<br>Material: $this->material<br>Blanket color: $this->blanketColor<br>Pet house with number: $this->petHouseNumber<br>";
        if (count($this->animals) > 0) {
            $returnedString .= "Animals: ";
            foreach ($this->animals as $animal) {
                $returnedString .= "<li>$animal->name</li>";
            }
        } else {
            $returnedString .= "This pet house is empty";
        }
        return $returnedString;
    }
}
