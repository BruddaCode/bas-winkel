<?php
include_once("backend/klant.php");
$klant = new Klant();


if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else if (isset($_GET["confirm"]) && $_GET["confirm"] == true) {
	if($klant->deleteKlant($_GET["id"])){

		header("Location:./klanten?message=2");
	} else {
		echo "Verwijderen is niet mogelijk, een artikel word nog gelevered door deze klant.";
	}
	
} else {
	?>
		<h1>verwijder klant?</h1>
		<h3>Weet u het zeker om deze klant te verwijderen?</h3>
		<a href="./orders" class="btn btn-secondary">Terug</a> <a
			href="./klants_delete?id=<?php echo $_GET["id"]; ?>&confirm=true" class="btn btn-danger">Ik weet het zeker, verwijder</a>

	<?php
}
?>