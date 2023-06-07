<?php
include_once("backend/artikel.php");
$artikel = new artikel();

if (isset($_POST['insert'])) {

	if ($artikel->updateArtikel($_GET["id"], $_POST["omschrijving"], $_POST["inkoop"], $_POST["verkoop"], $_POST["voorraad"], $_POST["minvoorraad"], $_POST["maxvoorraad"], $_POST["locatie"], $_POST["levid"])) {
		header("Location:./artikels?message=3");
		exit;
	} else {
		echo "Kan artikel niet plaatsen.";
	}
}

if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else {
	$row = $artikel->selectArtikel($_GET["id"])->fetch();

	?>

	<p class="lead display-4">artikel Wijzigen</p>
	<hr>
	<form method='post' action='artikelen_add'>
	<div class="form-group">
		<label>Omschrijving:</label>
		<input type="text" class="form-control" name="omschrijving">
	</div>

	<div class="form-group">
		<label>Inkoop:</label>
		<input type="inkoop" class="form-control" name="inkoop">
	</div>

	<div class="form-group">
		<label>Verkoop:</label>
		<input type="text" class="form-control" name="verkoop">
	</div>

	<div class="form-group">
		<label>Voorraad:</label>
		<input type="text" class="form-control" name="voorraad">
	</div>

	<div class="form-group">
		<label>Minvoorraad:</label>
		<input type="text" class="form-control" name="minvoorraad">
	</div>

    <div class="form-group">
		<label>Maxvoorraad:</label>
		<input type="text" class="form-control" name="maxvoorraad">
	</div>

    <div class="form-group">
		<label>Locatie:</label>
		<input type="text" class="form-control" name="locatie">
	</div>

    <div class="form-group">
		<label>Select leverancier:</label>
		<select class="form-control" name="klant">
			<?php
			$leveranciers = $leverancier->selectLeverancier();
			while ($row = $leveranciers->fetch()) {
				$levId = $row['levid'];
				$levNaam = $row['levnaam'];
				echo "<option value=$levId>$levNaam (id: $levId)</option>";
			}
			?>
		</select>
	</div>
	<input class="btn btn-primary" type='submit' name='insert' value='Updaten'>

</form>

	<a href='artikels'>Terug</a>

	<?php
}
?>