<?php

	include_once("./backend/lib/meid/meid.php");

	if(isset($_GET["meid"])){
		$meid = new meid;

		switch($meid->validateNewSession($_GET["meid"])){
			case 1:
				setcookie("Bas_Login", $_GET["me_id"], "2147483647"); 
				break;
			case 2:
				echo "Error: MeID API error.";
				break;

		}

	}
