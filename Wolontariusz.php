<?php

class Wolontariusz extends Osoba
{
    private $rola;


    public function __construct($imie, $nazwisko, $plec, $wiek, $numerTelefonu, $adresEmail, $rola)
    {
        parent::__construct($imie, $nazwisko, $plec, $wiek, $numerTelefonu, $adresEmail);
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
        $zwracana.= "Rola: $this->rola<br>";
        return $zwracana;
    }
}