<?php

include_once 'crud.php';
include_once 'artikel.php';
include_once 'klant.php';
class order extends crud
{

	public function __construct()
	{
		parent::__construct();
	}

	public function insertOrder($klantid, $verkorddatum, $verkordstatus = 0)
	{
		$this->insert("verkooporders", array("klantid" => $klantid, "verkorddatum" => $verkorddatum, "verkordstatus" => $verkordstatus));
		return true;
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
		$this->delete("verkooporders", "verkordid=" . $id);
	}
	public function updateOrder( $verkordstatus, $id){
		$this->update("verkooporders", array("verkordstatus" => $verkordstatus), "verkordid=" . $id);
	}

	public function selectKlanten()
	{
		$object = $this->select("klanten", "*");
		return $object;
	}

	public function selectArtikelen()
	{
		$object = $this->select("artikelen", "*");
		return $object;
	}
}