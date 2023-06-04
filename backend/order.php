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

	public function insertOrder($artid, $klantid, $verkorddatum, $verkordbestaantal = 1, $verkordstatus = 0)
	{
		$this->insert("verkooporders", array("artid" => $artid, "klantid" => $klantid, "verkorddatum" => $verkorddatum, "verkordbestaantal" => $verkordbestaantal, "verkordstatus" => $verkordstatus));
		return true;
	}
	public function selectOrders($id="*")
	{
		return $this->select("verkooporders", "*", "verkordid=" . $id);
	}
	public function deleteOrder($id){
		$this->delete("verkooporders", "verkordid=" . $id);
	}
	public function updateOrder($artid, $klantid, $verkorddatum, $verkordbestaantal, $verkordstatus, $id){
		$this->update("verkooporders", array("artid" => $artid, "klantid" => $klantid, "verkorddatum" => $verkorddatum, "verkordbestaantal" => $verkordbestaantal, "verkordstatus" => $verkordstatus), "verkordid=" . $id);
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