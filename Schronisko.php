<?php
require_once 'Buda.php';
class Schronisko
{
    private static $instance = null;
    private $nazwaSchroniska;
    private $budy = [];
    private $pracownicy = [];
    private $wolontariusze = [];




    private function __construct($nazwaSchroniska)
    {
        $this->nazwaSchroniska = $nazwaSchroniska;
        self::$instance = $this;
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            echo "Schronisko nie istnieje";
            echo "<br>";
            return null;
        }
        return self::$instance;
    }

    public static function stworzSchronisko($nazwaSchroniska)
    {
        if (self::$instance != null)
        {
            echo "Schronisko już istnieje!";
            echo "<br>";
            return null;
        }
        new Schronisko($nazwaSchroniska);
        echo "Utworzono schronisko o nazwie $nazwaSchroniska";
        return self::$instance;
    }

    public function dodajZwierze($zwierze)
    {
        if (count($this->budy) == 0)
        {
            echo "W tym schronisku nie ma żadnej budy";
            echo "<br>";
            return false;
        }

        foreach ($this->budy as $buda)
        {
//            print_r($buda);
            foreach ($buda->zwierzeta as $z)
            {
                if ($zwierze == $z)
                {
                    echo "To zwierze jest już dodane do budy";
                    echo "<br>";
                    return false;
                }
            }
            if ($buda->dodajZwierze($zwierze) == true)
            {
                echo "Dodano zwierzę o imieniu $zwierze->imie do budy o numerze $buda->numerBudy";
                echo "<br>";
                return true;
            }
        }
        echo "W tym schronisku nie ma żadnej wolnej budy!";
        echo "<br>";
        return false;
    }

    public function czyJestWSchronisku($zwierze)
    {
        foreach ($this->budy as $buda)
        {
            foreach ($buda->zwierzeta as $z)
            {
                if ($z == $zwierze)
                {
                    return true;
                }
            }
        }
        return false;
    }

    public function adoptujZwierze($zwierze, $osobaAdoptujaca)
    {
        if ($this->czyJestWSchronisku($zwierze) == false)
        {
            echo "Nie ma takiego zwierzęcia w schronisku";
            return false;
        }


        for($i = 0; $i < count($this->budy); $i++){
            for($j = 0; $j < count($this->budy[$i]->zwierzeta); $j++){
                if($this->budy[$i]->zwierzeta[$j] == $zwierze){
                    array_splice($this->budy[$i]->zwierzeta, $j, 1);
                    array_push($osobaAdoptujaca->adoptowaneZwierzeta, $zwierze);
                    echo "$osobaAdoptujaca->imie $osobaAdoptujaca->nazwisko adoptował/a $zwierze->imie";
                    return true;
                }
            }
        }

    }

    public function dodajBude($buda)
    {
        foreach ($this->budy as $b)
        {
            if ($buda == $b)
            {
                echo "Ta buda jest już w schronisku!";
                echo "<br>";
                return false;
            }
        }
        array_push($this->budy, $buda);
        echo "Dodano budę do schroniska";
        echo "<br>";
    }

    public function zatrudnijPracownika($pracownik)
    {
        foreach ($this->pracownicy as $p)
        {
            if ($pracownik == $p)
            {
                echo "Taki pracownik jest już zatrudniony!";
                echo "<br>";
                return false;
            }
        }
        array_push($this->pracownicy, $pracownik);
        echo "Zatrudniono pracownika!";
        return true;
    }

    public function zwolnijPracownika($pracownik)
    {
        foreach ($this->pracownicy as $p)
        {
            if ($pracownik == $p)
            {
                echo "Pracownik został zwolniony";
                array_splice($this->pracownicy, $p , 1);
                echo "<br>";
                return true;
            }
        }
        echo "Nie ma takiego pracownika<br>";
        return false;
    }

    public function dodajWolontariusza($wolontariusz)
    {
        foreach ($this->wolontariusze as $w)
        {
            if ($wolontariusz == $w)
            {
                echo "Taki wolontariusz jest już dodany!";
                echo "<br>";
                return false;
            }
        }
        array_push($this->wolontariusze, $wolontariusz);
        echo "Dodano wolontariusza!";
        return true;
    }

    public function usunWolontariusza($wolontariusz)
    {
        foreach ($this->wolontariusze as $w)
        {
            if ($wolontariusz == $w)
            {
                echo "Wolontariusz został usunięty";
                array_splice($this->wolontariusze, $w , 1);
                echo "<br>";
                return true;
            }
        }
        echo "Nie ma takiego wolontariusza<br>";
        return false;
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
        $zwracana = "Schronisko: $this->nazwaSchroniska<br>";
        if (count($this->budy) > 0)
        {
            $zwracana.="Budy:<br>";
            foreach ($this->budy as $buda)
            {
                $zwracana.="$buda<br><br>";
            }
        }
        if (count($this->pracownicy) > 0)
        {
            $zwracana.="Pracownicy:<br><br>";
            foreach ($this->pracownicy as $pracownik)
            {
                $zwracana.="$pracownik<br>";
            }
        }
        if (count($this->wolontariusze) > 0)
        {
            $zwracana.="Wolontariusze:<br><br>";
            foreach ($this->wolontariusze as $wolontariusz)
            {
                $zwracana.="$wolontariusz<br>";
            }
        }
        return $zwracana;
    }

}