<?php
include_once 'crud.php';
class artikel extends crud
{

	public function __construct()
	{
		parent::__construct();
	}

	public function insertArtikel($omschrijving, $inkoop, $verkoop, $voorraad, $minvoorraad, $maxvoorraad, $locatie, $levid)
	{
		return $this->insert("artikelen", array("artikelenomschrijving" => $omschrijving, "artinkoop" => $inkoop, "artverkoop" => $verkoop, "artvoorraad" => $voorraad, "artminvoorraad" => $minvoorraad, "artmaxvoorraad" => $maxvoorraad, "artlocatie" => $locatie, "levid" => $levid));
	}
	public function selectArtikel($id = false)
	{
		if ($id) {
			return $this->select("artikelen", "*", "artid=" . $id);
		} else {
			return $this->select("artikelen", "*");
		}

	}
	public function deleteArtikel($id)
	{
		return $this->delete("artikelen", "artid=" . $id);
	}
	public function updateArtikel($id, $omschrijving, $inkoop, $verkoop, $voorraad, $minvoorraad, $maxvoorraad, $locatie, $levid)
	{
		return $this->update("artikelen", array("artikelenomschrijving" => $omschrijving, "artinkoop" => $inkoop, "artverkoop" => $verkoop, "artvoorraad" => $voorraad, "artminvoorraad" => $minvoorraad, "artmaxvoorraad" => $maxvoorraad, "artlocatie" => $locatie, "levid" => $levid), "artid=" . $id);
	}

}