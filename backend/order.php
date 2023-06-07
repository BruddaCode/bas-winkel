<?php

include_once 'crud.php';
class order extends crud
{

	public function __construct()
	{
		parent::__construct();
	}

	public function insertOrder($klantid, $verkorddatum, $verkordstatus = 0)
	{
		return $this->insert("verkooporders", array("klantid" => $klantid, "verkorddatum" => $verkorddatum, "verkordstatus" => $verkordstatus));
	}

	public function insertArtikel($verkoopid, $artid, $aantal)
	{
		if ($this->insert("tussentabelverkoop", array("verkoopid" => $verkoopid, "artid" => $artid, "aantal" => $aantal))) {
			header("location: index.php?page=orders_artikelen&id=" . $verkoopid);
			exit;
		} else {
			$this->update("tussentabelverkoop", array("artid" => $artid, "aantal" => $aantal), "verkoopid=" . $verkoopid);
			header("location: index.php?page=orders_artikelen&id=" . $verkoopid);
			exit;
		}
	}

	public function selectOrders($id=false)
	{
		if($id){
			return $this->select("verkooporders INNER JOIN klanten ON verkooporders.klantid = klanten.klantid", "verkooporders.verkordid, klanten.klantnaam, verkooporders.verkorddatum, verkooporders.verkordstatus", "verkordid=" . $id);
		} else {
			return $this->select("verkooporders INNER JOIN klanten ON verkooporders.klantid = klanten.klantid", "verkooporders.verkordid, klanten.klantnaam, verkooporders.verkorddatum, verkooporders.verkordstatus");
		}
		
	}
	public function deleteOrder($id){
		return $this->delete("verkooporders", "verkordid=" . $id);
	}
	public function updateOrder($verkordstatus, $id){
		return $this->update("verkooporders", array("verkordstatus" => $verkordstatus), "verkordid=" . $id);
	}

}