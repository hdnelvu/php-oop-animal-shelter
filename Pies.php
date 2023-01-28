<?php

require_once 'Zwierze.php';
class Pies extends Zwierze
{
    private $dlugoscOgona;
    private $umiejetnosci = [];


    public function __construct($imie, $wiek, $rasa, $waga, $plec, $dlugoscOgona, $umiejetnosci)
    {
        parent::__construct($imie, $wiek, $rasa, $waga, $plec);
        $this->dlugoscOgona = $dlugoscOgona;
        $this->umiejetnosci = $umiejetnosci;
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
        if (count($this->umiejetnosci)>0)
        {
            $zwracana.="Umiejętności: ";
            foreach ($this->umiejetnosci as $umiejetnosc)
            {
                $zwracana.="<li>$umiejetnosc</li>";
            }
        }
        return $zwracana;
    }

}