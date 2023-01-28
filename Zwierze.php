<?php

abstract class Zwierze
{
    protected $imie;
    protected $wiek;
    protected $rasa;
    protected $waga;
    protected $plec;

    public function __construct($imie, $wiek, $rasa, $waga, $plec)
    {
        $this->imie = $imie;
        $this->wiek = $wiek;
        $this->rasa = $rasa;
        $this->waga = $waga;
        $this->plec = $plec;
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
        return "Imie: $this->imie<br>Wiek: $this->wiek<br>Rasa: $this->rasa<br>Waga: $this->waga kg<br>Płeć: $this->plec<br>";
    }

}