<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@700&display=swap');

        html{
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 32px;
        }

        #pies{
            position: fixed;
            right: 0px;
            bottom: 0px;
        }

        p{
            font-weight: 700;
        }

    </style>
</head>
<img src="assets/doggif.gif" alt="PiesAnimowany" id="pies">


<?php

// Załączamy wymagane klasy

require_once 'Pies.php';
require_once 'Kot.php';
require_once 'Buda.php';
require_once 'Pracownik.php';
require_once 'Wolontariusz.php';
require_once 'OsobaAdoptujaca.php';
require_once 'Schronisko.php';


// Tworzymy obiekt Pies

$pies = new Pies("Miko", 2.4,"York", 2.35, "Pies", 13,["Daj łapę", "Leżeć", "Siad", "Obrót", "Turlaj się"]);


// Wyświetlamy powstały obiekt

echo "<p>Psy:</p>";
echo "$pies";
echo "<br>";


// Zmieniamy imię psa na "Mikuś"

$pies->imie = "Mikuś";

echo "Aktualne imię psa: $pies->imie";
echo "<br>";





// Tworzymy obiekt Kot

$kot = new Kot('Łatka', 1, "Bengalski", 3, "Kotka", 9);

echo "<p>Koty:</p>";
echo "$kot";
echo "<br>";


// Zmieniamy wagę kota na 3.2kg

$kot->waga = 3.2;

echo "Aktualna waga kota: $kot->waga kg<br>";





// Tworzymy obiekt Buda

$buda = new Buda(10, 'Drewno', 'Zielony');

echo "<p>Budy:</p>";
echo "$buda";
echo "<br><br>";




// Tworzymy obiekt Pracownik

$pracownik = new Pracownik('Jan', 'Kuszczyński', 'Mężczyzna', 31,718844571, "Janeczek058@o2.pl", 5500, "Dog Walker");

echo "<p>Pracownicy:</p>";
echo "$pracownik";
echo "<br><br>";



// Tworzymy obiekt Wolontariusz

$wolontariusz = new Wolontariusz('Patrycja', 'Kamińska', 'Kobieta', 21,418795321, "PatiWariati@wp.pl", "Karmienie zwierząt");

echo "<p>Wolontariusze:</p>";
echo "$wolontariusz";
echo "<br><br>";



// Tworzymy obiekt Schronisko

$schronisko = Schronisko::stworzSchronisko("PsitulMnie");
echo "<br><br>";




// Dodajmy zwierzaki do naszego schroniska

$schronisko->dodajZwierze($pies);
$schronisko->dodajZwierze($kot);
echo "<br>";




// Dodajemy budę

$schronisko->dodajBude($buda);

// Spróbujmy dodać tą samą budę po raz drugi

$schronisko->dodajBude($buda);
echo "<br>";



// Dodajemy psa do budy nr 1

$schronisko->dodajZwierze($pies);
echo "<br>";

//Spróbujmy dodać tego samego psa po raz drugi

$schronisko->dodajZwierze($pies);
echo "<br>";

// Nie udało się, a co w przypadku kota?

$schronisko->dodajZwierze($kot);
echo "<br><br>";

// Na każdą budę przypada jeden typ zwierzęcia



//Sprawdźmy kto i co znajduje się w naszym schronisku
echo $schronisko;

// Tworzymy obiekt osobaAdoptująca

$osobaAdoptujaca = new OsobaAdoptujaca('Andrzej', 'Jaworek', 'Mężczyzna', '45', '519234321', 'top1femboy@gmail.xd');

echo "<p>Osoby adoptujące:</p>";
echo "$osobaAdoptujaca";
echo "<br><br>";


// Niech nowo dodana osoba adoptująca adoptuje jakiegoś zwierzaka

$schronisko->adoptujZwierze($pies, $osobaAdoptujaca);
echo "<br><br>";

// Sprawdźmy czy piesek zniknął ze strony schroniska
echo "$schronisko";
echo "<br><br>";

// Sprawdźmy czy pan Andrzej posiada teraz jakiegoś pieska
echo "$osobaAdoptujaca";
echo "<br><br>";



// Zatrudnijmy jakiegoś pracownika

$schronisko->zatrudnijPracownika($pracownik);
echo "<br><br>";

// Dodajmy też jakiegoś wolontariusza

$schronisko->dodajWolontariusza($wolontariusz);
echo "<br><br>";

// Sprawdźmy ostateczny status naszego schroniska

echo $schronisko;
