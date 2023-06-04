<?php
include_once 'crud.php';
class leverancier extends crud
{

	public function __construct()
	{
		parent::__construct();
	}

	public function insertLeverancier($naam, $contact, $email, $adres, $postcode, $plaats)
	{
		return $this->insert("leveranciers", array("levnaam" => $naam, "levcontact" => $contact, "levemail" => $email, "levadres" => $adres, "levpostcode" => $postcode, "levwoonplaats" => $plaats));
	}
	public function selectLeverancier($id = false)
	{
		if ($id) {
			return $this->select("leveranciers", "*", "levid=" . $id);
		} else {
			return $this->select("leveranciers", "*");
		}

	}
	public function deleteLeverancier($id)
	{
		return $this->delete("leveranciers", "levid=" . $id);
	}
	public function updateLeverancier($id, $naam, $contact, $email, $adres, $postcode, $plaats)
	{
		return $this->update("leveranciers", array("levid" => $id, "levnaam" => $naam, "levcontact" => $contact, "levemail" => $email, "levadres" => $adres, "levpostcode" => $postcode, "levplaats" => $plaats), "levid=" . $id);
	}

}