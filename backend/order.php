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

	public function insertOrder($artid, $klantid, $verkorddatum, $verkordbestaantal = 1, $verkordstatus = "in behandeling")
	{
		$this->insert("verkooporders", array("artid" => $artid, "klantid" => $klantid, "verkorddatum" => $verkorddatum, "verkordbestaantal" => $verkordbestaantal, "verkordstatus" => $verkordstatus));
		return true;
	}
	public function selectOrders()
	{
		return $this->select("verkooporders", "*");
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