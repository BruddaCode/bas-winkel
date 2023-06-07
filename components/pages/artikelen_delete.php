<?php
include_once("backend/artikel.php");
$artikel = new artikel();


if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else if (isset($_GET["confirm"]) && $_GET["confirm"] == true) {
	if($artikel->deleteArtikel($_GET["id"])){

		header("Location:./artikelen?message=2");
	} else {
		echo "Verwijderen is niet mogelijk.";
	}
	
} else {
	?>
		<h1>verwijder artikel?</h1>
		<h3>Weet u het zeker om deze artikel te verwijderen?</h3>
		<a href="./orders" class="btn btn-secondary">Terug</a> <a
			href="./artikels_delete?id=<?php echo $_GET["id"]; ?>&confirm=true" class="btn btn-danger">Ik weet het zeker, verwijder</a>

	<?php
}