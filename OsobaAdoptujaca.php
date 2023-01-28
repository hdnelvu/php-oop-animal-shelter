<?php

class OsobaAdoptujaca extends Osoba
{

    private $adoptowaneZwierzeta = [];


    public function __construct($imie, $nazwisko, $plec, $wiek, $numerTelefonu, $adresEmail)
    {
        parent::__construct($imie, $nazwisko, $plec, $wiek, $numerTelefonu, $adresEmail);
    }

    public function __toString()
    {
        $zwracana = parent::__toString();
        if (count($this->adoptowaneZwierzeta)>0)
        {
            $zwracana.="Adoptowane zwierzęta: ";
            foreach ($this->adoptowaneZwierzeta as $zwierze)
            {
                $zwracana.="<li>$zwierze->imie</li>";
            }
        }
        else
        {
            $zwracana.="Ta osoba nie adoptowała żadnego zwierzęcia";
        }
        return $zwracana;
    }


    public function &__get($zmienna)
    {
        return $this->$zmienna;
    }

    public function __set($zmienna, $value)
    {
        $this->$zmienna = $value;
    }



}