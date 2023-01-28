<?php
require_once 'Osoba.php';
class Pracownik extends Osoba
{
    private $pensja;
    private $rola;


    public function __construct($imie, $nazwisko, $plec, $wiek, $numerTelefonu, $adresEmail, $pensja, $rola)
    {
        parent::__construct($imie, $nazwisko, $plec, $wiek, $numerTelefonu, $adresEmail);
        $this->pensja = $pensja;
        $this->rola = $rola;
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
        $zwracana.= "Pensja: $this->pensja zł<br>";
        $zwracana.= "Rola: $this->rola<br>";
        return $zwracana;
    }

}