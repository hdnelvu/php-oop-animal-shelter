<?php

abstract class Osoba
{
    protected $imie;
    protected $nazwisko;
    protected $plec;
    protected $wiek;
    protected $numerTelefonu;
    protected $adresEmail;


    public function __construct($imie, $nazwisko, $plec, $wiek, $numerTelefonu, $adresEmail)
    {
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->plec = $plec;
        $this->wiek = $wiek;
        $this->numerTelefonu = $numerTelefonu;
        $this->adresEmail = $adresEmail;
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
        return "Imię: $this->imie<br>Nazwisko: $this->nazwisko<br>Płeć: $this->plec<br>Wiek: $this->wiek lat<br>Numer Telefonu: +48 $this->numerTelefonu<br>Adres Email: $this->adresEmail<br>";
    }

}