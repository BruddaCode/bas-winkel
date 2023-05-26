<?php

    include_once 'crud.php';

class Klant extends database{
    public $klantid;
    public $klantnaam;
    public $klantemail;
    public $klantadres;
    public $klantpostcode;
    public $klantwoonplaats;

    public function __construct($klantnaam, $klantemail, $klantadres, $klantpostcode, $klantwoonplaats)
    {
        parent::__construct();
        
        $this->klantnaam = $klantnaam;
        $this->klantemail = $klantemail;
        $this->klantadres = $klantadres;
        $this->klantpostcode = $klantpostcode;
        $this->klantwoonplaats = $klantwoonplaats;
    }

    public function insertKlant()
    {
        $klant = $this->select("klant", "*", $this->klantnaam, $this->klantemail, $this->klantadres, $this->klantpostcode, $this->klantwoonplaats);

        $klant_object = $klant->insert("klant", $klant);
        return $klant_object;
    }

    
}

?>
