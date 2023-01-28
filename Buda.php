<?php
class Buda
{
    private static $licznik = 0;
    private $zwierzeta = [];
    private $pojemnosc;
    private $material;
    private $kolorKoca;
    private $numerBudy;


    public function __construct($pojemnosc, $material, $kolorKoca)
    {
        $this->pojemnosc = $pojemnosc;
        $this->material = $material;
        $this->kolorKoca = $kolorKoca;
        self::$licznik++;
        $this->numerBudy = self::$licznik;
    }

    public function &__get($zmienna)
    {
        return $this->$zmienna;
    }

    public function __set($zmienna, $value)
    {
        $this->$zmienna = $value;
    }

    public function dodajZwierze($zwierze)
    {
        if(count($this->zwierzeta) > 0){
            if(get_class($this->zwierzeta[0]) != get_class($zwierze)){
                return false;
            }
        }

        foreach ($this->zwierzeta as $z)
        {
            if ($z == $zwierze)
            {
                return false;
            }
        }

        if (count($this->zwierzeta)<$this->pojemnosc)
        {
            array_push($this->zwierzeta, $zwierze);
            return true;
        }
        else
        {
            return false;
        }
    }

    public function usunZwierze($zwierze)
    {
        foreach ($this->zwierzeta as $key => $z)
        {
            if ($z == $zwierze)
            {
                array_splice($this->zwierzeta, $key, 1);
                return true;
            }
        }
        return false;
    }

    public function __toString()
    {

        $zwracana =  "Pojemność: $this->pojemnosc<br>Materiał: $this->material<br>Kolor koca: $this->kolorKoca<br>Numer budy: $this->numerBudy<br>";
        if (count($this->zwierzeta)>0)
        {
            $zwracana.="Zwierzęta: ";
            foreach ($this->zwierzeta as $zwierze)
            {
                $zwracana.="<li>$zwierze->imie</li>";
            }
        }
        else
        {
            $zwracana.="Ta buda jest pusta";
        }
        return $zwracana;
    }

}