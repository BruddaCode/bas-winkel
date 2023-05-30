<?php

    include_once 'crud.php';

class Klant extends database{
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
        $object = $this->select("klanten", "*", "klantnaam='" . $this->klantnaam . "' OR klantemail='" . $this->klantemail . "' LIMIT 1");
			
        if($object->rowCount() == 1){
            return false;
        } else {
            $this->insert("klanten", array("klantnaam" => $this->klantnaam, "klantemail" => $this->klantemail, "klantadres" => $this->klantadres, "klantpostcode" => $this->klantpostcode, "klantwoonplaats" => $this->klantwoonplaats));
            return true;
        }
    }

    
}

?>
