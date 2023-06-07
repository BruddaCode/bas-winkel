<?php

include_once 'crud.php';

class inkoop extends crud
{

	public function __construct()
	{
		parent::__construct();
	}

	public function insertInkoop($levid, $inkorddatum, $inkordstatus = 0)
	{
		return $this->insert("inkooporders", array("levid" => $levid, "inkorddatum" => $inkorddatum, "inkordstatus" => $inkordstatus));
	}

	// Opdracht vervalt
	/*public function insertArtikel($verkoopid, $artid, $aantal)
	{
		if ($this->insert("tussentabelverkoop", array("verkoopid" => $verkoopid, "artid" => $artid, "aantal" => $aantal))) {
			header("location: index.php?page=orders_artikelen&id=" . $verkoopid);
			exit;
		} else {
			$this->update("tussentabelverkoop", array("artid" => $artid, "aantal" => $aantal), "verkoopid=" . $verkoopid);
			header("location: index.php?page=orders_artikelen&id=" . $verkoopid);
			exit;
		}
	}*/

	public function selectInkoop($id=false)
	{
		if($id){
			return $this->select("inkooporders INNER JOIN leveranciers ON inkooporders.levid = leveranciers.levid", "inkooporders.inkordid, leveranciers.levnaam, inkooporders.inkorddatum, inkooporders.inkordstatus", "inkordid=" . $id);
		} else {
			return $this->select("inkooporders INNER JOIN leveranciers ON inkooporders.levid = leveranciers.levid", "inkooporders.inkordid, leveranciers.levnaam, inkooporders.inkorddatum, inkooporders.inkordstatus");
		}
		
	}
	public function deleteInkoop($id){
		return $this->delete("inkooporders", "inkordid=" . $id);
	}
	public function updateInkoop($inkordstatus, $id){
		return $this->update("inkooporders", array("inkordstatus" => $inkordstatus), "inkordid=" . $id);
	}

}