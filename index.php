<head>
    <title>Animal Shelter</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@700&display=swap');

        html{
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 32px;
        }

        p{
            font-weight: 700;
        }

    </style>
</head>


<?php

// Attaching required classes

require_once 'Dog.php';
require_once 'Cat.php';
require_once 'PetHouse.php';
require_once 'Employee.php';
require_once 'Volunteer.php';
require_once 'Adopter.php';
require_once 'Shelter.php';


// Creating Dog object

$dog = new Dog("Miko", 3,"York", 2.35, "Male", 13, ["Speak", "Wave", "Spin", "Take a bow", "Roll over"]);


// Displaying Dog object

echo "<p>Dogs:</p>";
echo "$dog";
echo "<br>";


// Changing dog's name

$dog->name = "Max";

echo "Current dog name: $dog->name";
echo "<br>";



// Creating Cat object

$cat = new Cat('Bella', 1, "Bengal Cat", 3, "Female", 9);

echo "<p>Cats:</p>";
echo "$cat";
echo "<br>";


// Changing the cat's weight

$cat->weight = 3.2;

echo "Current cat weight: $cat->weight kg";
echo "<br>";



// Creating PetHouse object

$petHouse = new PetHouse(10, 'Wood', 'Green');

echo "<p>Pet houses:</p>";
echo "$petHouse";
echo "<br><br>";



// Creating Employee object

$employee = new Employee('Peter', 'White', 'Male', 31,718844571, "PeterWhite@gmail.com", 5500, "Dog Walker");

echo "<p>Pracownicy:</p>";
echo "$employee";
echo "<br><br>";



// Creating Volunteer object

$volunteer = new Volunteer('Kimberly', 'Wexler', 'Female', 36,418795321, "KimWexler@gmail.com", "Pet Feeder");

echo "<p>Volunteers:</p>";
echo "$volunteer";
echo "<br><br>";



// Creating Shelter object

$shelter = Shelter::createShelter("Sweet Lovie Rescue");
echo "<br><br>";



// Trying to add animals to empty shelter

$shelter->addAnimal($dog);
echo "<br>";
$shelter->addAnimal($cat);
echo "<br>";



// Adding new pet house to shelter

$shelter->addPetHouse($petHouse);
echo "<br>";



// Trying to add same pet house again

$shelter->addPetHouse($petHouse);
echo "<br>";



// Adding dog to pet house number 1

$shelter->addAnimal($dog);
echo "<br>";



// Trying to add same dog to pet house number 1 again

$shelter->addAnimal($dog);
echo "<br>";



// Didn't work, trying to add cat to pet house number 1

$shelter->addAnimal($cat);
echo "<br><br>";

// Also didn't work



//Checking actual info about our shelter
echo $shelter;



// Creating Adopter object

$adopter = new Adopter('Andrew', 'Carter', 'Male', '45', '519234321', 'AndrewCarter@gmail.com');

echo "<p>Adopters:</p>";
echo "$adopter";
echo "<br><br>";



// Letting adopter adopt dog

$shelter->adoptAnimal($dog, $adopter);
echo "<br><br>";



// Checking if dog disappeared from shelter
echo "$shelter";
echo "<br><br>";



// Checking if adopter now has any pets
echo "$adopter";
echo "<br><br>";



// Hiring an employee

$shelter->hireEmployee($employee);
echo "<br><br>";



// Adding volunteer

$shelter->addVolunteer($volunteer);
echo "<br><br>";



// Checking final information's about shelter

echo $shelter;
