<?php

require_once 'Zwierze.php';
class Kot extends Zwierze
{

    private $dlugoscOgona;


    public function __construct($imie, $wiek, $rasa, $waga, $plec, $dlugoscOgona)
    {
        parent::__construct($imie, $wiek, $rasa, $waga, $plec);
        $this->dlugoscOgona = $dlugoscOgona;
    }

    public function __get($zmienna)
    {
        return $this->$zmienna;
    }

    public function __set($zmienna, $value)
    {
        $this->$zmienna = $value;
    }

    public function __toString()
    {
        $zwracana = parent::__toString();
        $zwracana.= "Długość ogona: $this->dlugoscOgona cm<br>";
        return $zwracana;
    }

}