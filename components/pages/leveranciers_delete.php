<?php
include_once("backend/leverancier.php");
$leverancier = new leverancier();


if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else if (isset($_GET["confirm"]) && $_GET["confirm"] == true) {
	if($leverancier->deleteLeverancier($_GET["id"])){

		header("Location:./leveranciers?message=2");
	} else {
		echo "Verwijderen is niet mogelijk, een artikel word nog gelevered door deze leverancier.";
	}
	
} else {
	?>
		<h1>verwijder Leverancier?</h1>
		<h3>Weet u het zeker om deze leverancier te verwijderen?</h3>
		<a href="./orders" class="btn btn-secondary">Terug</a> <a
			href="./leveranciers_delete?id=<?php echo $_GET["id"]; ?>&confirm=true" class="btn btn-danger">Ik weet het zeker, verwijder</a>

	<?php
}
?>