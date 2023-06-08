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
    public function selectSearch($search)
	{
        return $this->select("klanten", "*", "klantnaam LIKE '%" . $search . "%' OR klantemail LIKE '%" . $search . "%'");

	}

    public function deleteKlant($id)
	{
		return $this->delete("klanten", "klantid=" . $id);
	}
	public function updateKlant($id, $naam, $email, $adres, $postcode, $plaats)
	{
		return $this->update("klanten", array("klantid" => $id, "klantnaam" => $naam, "klantemail" => $email, "klantadres" => $adres, "klantpostcode" => $postcode, "klantwoonplaats" => $plaats), "klantid=" . $id);
	}
}

?>
