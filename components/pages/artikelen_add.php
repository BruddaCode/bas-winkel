<?php
include_once("backend/artikel.php");
include_once("backend/leverancier.php");
$artikel = new artikel();
$leverancier = new leverancier();

if (isset($_POST['insert'])) {

	if ($artikel->insertArtikel($_POST["omschrijving"], $_POST["inkoop"], $_POST["verkoop"], $_POST["voorraad"], $_POST["minvoorraad"], $_POST["maxvoorraad"], $_POST["locatie"], $_POST["levid"])) {
		header("Location:./artikelen?message=1");
		exit;
	} else {
		echo "Kan artikel niet toevoegen.";
	}
}
?>


<p class="lead display-4">artikel toevoegen</p>
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
		<select class="form-control" name="levid">
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
	<input class="btn btn-primary" type='submit' name='insert' value='Verzenden'>

</form>