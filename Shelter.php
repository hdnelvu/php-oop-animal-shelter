<?php
require_once "PetHouse.php";
class Shelter
{
    private static $instance = null;
    private $shelterName;
    private $petHouses = [];
    private $employees = [];
    private $volunteers = [];

    private function __construct($shelterName)
    {
        $this->shelterName = $shelterName;
        self::$instance = $this;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            echo "This shelter does not exist!";
            echo "<br>";
            return null;
        }
        return self::$instance;
    }

    public static function createShelter($shelterName)
    {
        if (self::$instance != null) {
            echo "The shelter already exists!";
            echo "<br>";
            return null;
        }
        new Shelter($shelterName);
        echo "A shelter named $shelterName was created";
        return self::$instance;
    }

    public function addAnimal($animal)
    {
        if (count($this->petHouses) == 0) {
            echo "There are no pet houses in this shelter";
            echo "<br>";
            return false;
        }

        foreach ($this->petHouses as $petHouse) {
            foreach ($petHouse->animals as $a) {
                if ($animal == $a) {
                    echo "This animal is already added to pet house!";
                    echo "<br>";
                    return false;
                }
            }

            if ($petHouse->addAnimal($animal) == true) {
                echo "Added an animal named $animal->name to the pet house with number $petHouse->petHouseNumber";
                echo "<br>";
                return true;
            }
        }
        echo "There are no free pet houses in this shelter!";
        echo "<br>";
        return false;
    }

    public function isInShelter($animal)
    {
        foreach ($this->petHouses as $petHouse) {
            foreach ($petHouse->animals as $a) {
                if ($a == $animal) {
                    return true;
                }
            }
        }
        return false;
    }

    public function adoptAnimal($animal, $adopter)
    {
        if ($this->isInShelter($animal) == false) {
            echo "There is no such animal in the shelter";
            return false;
        }

        for ($i = 0; $i < count($this->petHouses); $i++) {
            for ($j = 0; $j < count($this->petHouses[$i]->animals); $j++) {
                if ($this->petHouses[$i]->animals[$j] == $animal) {
                    array_splice($this->petHouses[$i]->animals, $j, 1);
                    array_push($adopter->adoptedAnimals, $animal);

                    echo "$adopter->name $adopter->lastName adopted $animal->name";

                    return true;
                }
            }
        }
    }

    public function addPetHouse($petHouse)
    {
        foreach ($this->petHouses as $p) {
            if ($petHouse == $p) {
                echo "This pet house is already in the shelter!";
                echo "<br>";
                return false;
            }
        }
        array_push($this->petHouses, $petHouse);
        echo "Added pet house to shelter";
        echo "<br>";
    }

    public function hireEmployee($employee)
    {
        foreach ($this->employees as $e) {
            if ($employee == $e) {
                echo "Such an employee is already employed!";
                echo "<br>";
                return false;
            }
        }
        array_push($this->employees, $employee);
        echo "Hired employee!";
        return true;
    }

    public function fireEmployee($employee)
    {
        foreach ($this->employees as $e) {
            if ($employee == $e) {
                echo "The employee has been fired";
                array_splice($this->employees, $e, 1);
                echo "<br>";
                return true;
            }
        }
        echo "There is no such employee<br>";
        return false;
    }

    public function addVolunteer($volunteer)
    {
        foreach ($this->volunteers as $v) {
            if ($volunteer == $v) {
                echo "Such a volunteer is already added!";
                echo "<br>";
                return false;
            }
        }
        array_push($this->volunteers, $volunteer);
        echo "Volunteer added!";
        return true;
    }

    public function removeVolunteer($volunteer)
    {
        foreach ($this->volunteers as $v) {
            if ($volunteer == $v) {
                echo "Volunteer has been removed";
                array_splice($this->volunteers, $v, 1);
                echo "<br>";
                return true;
            }
        }
        echo "There is no such volunteer<br>";
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
        $returnedString = "Shelter: $this->shelterName<br>";
        if (count($this->petHouses) > 0) {
            $returnedString .= "Pet houses:<br>";
            foreach ($this->petHouses as $petHouse) {
                $returnedString .= "$petHouse<br><br>";
            }
        }
        if (count($this->employees) > 0) {
            $returnedString .= "Employees:<br><br>";
            foreach ($this->employees as $employee) {
                $returnedString .= "$employee<br>";
            }
        }
        if (count($this->volunteers) > 0) {
            $returnedString .= "Volunteers:<br><br>";
            foreach ($this->volunteers as $volunteer) {
                $returnedString .= "$volunteer<br>";
            }
        }
        return $returnedString;
    }
}
