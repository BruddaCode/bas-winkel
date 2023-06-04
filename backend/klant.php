<?php

    include_once 'crud.php';

class Klant extends crud{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertKlant($klantnaam, $klantemail, $klantadres, $klantpostcode, $klantwoonplaats)
    {
        $object = $this->select("klanten", "*", "klantnaam='" . $klantnaam . "' OR klantemail='" . $klantemail . "' LIMIT 1");
			
        if($object->rowCount() == 1){
            return false;
        } else {
            $this->insert("klanten", array("klantnaam" => $klantnaam, "klantemail" => $klantemail, "klantadres" => $klantadres, "klantpostcode" => $klantpostcode, "klantwoonplaats" => $klantwoonplaats));
            return true;
        }
    }

    public function selectKlant($id = false)
	{
		if ($id) {
			return $this->select("klanten", "*", "klantid=" . $id);
		} else {
			return $this->select("klanten", "*");
		}

	}

    public function deleteKlant($id)
	{
		return $this->delete("klanten", "klantid=" . $id);
	}
	public function updateklant($id, $naam, $email, $adres, $postcode, $plaats)
	{
		return $this->update("klants", array("klantid" => $id, "klantnaam" => $naam, "klantemail" => $email, "klantadres" => $adres, "klantpostcode" => $postcode, "klantplaats" => $plaats), "klantid=" . $id);
	}
}

?>
