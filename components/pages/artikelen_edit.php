<?php
include_once("backend/artikel.php");
include_once("backend/leverancier.php");
$artikel = new artikel();
$leverancier = new leverancier();

if (isset($_POST['insert'])) {

	if ($artikel->updateArtikel($_GET["id"], $_POST["omschrijving"], $_POST["inkoop"], $_POST["verkoop"], $_POST["voorraad"], $_POST["minvoorraad"], $_POST["maxvoorraad"], $_POST["locatie"], $_POST["levid"])) {
		header("Location:./artikelen?message=3");
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

<p class="lead display-4">Artikel Wijzigen</p>
<hr>
<form method='post' action='artikelen_edit?id=<?php echo $_GET['id'] ?>'>

	<div class="form-group">
		<label>Omschrijving:</label>
		<input type="text" class="form-control" name="omschrijving" value="<?php echo $row["artikelenomschrijving"]; ?>">
	</div>

	<div class="form-group">
		<label>Inkoop:</label>
		<input type="inkoop" class="form-control" name="inkoop" value="<?php echo $row["artinkoop"]; ?>">
	</div>

	<div class="form-group">
		<label>Verkoop:</label>
		<input type="text" class="form-control" name="verkoop" value="<?php echo $row["artverkoop"]; ?>">
	</div>

	<div class="form-group">
		<label>Voorraad:</label>
		<input type="text" class="form-control" name="voorraad" value="<?php echo $row["artvoorraad"]; ?>">
	</div>

	<div class="form-group">
		<label>Minvoorraad:</label>
		<input type="text" class="form-control" name="minvoorraad" value="<?php echo $row["artminvoorraad"]; ?>">
	</div>

    <div class="form-group">
		<label>Maxvoorraad:</label>
		<input type="text" class="form-control" name="maxvoorraad" value="<?php echo $row["artmaxvoorraad"]; ?>">
	</div>

    <div class="form-group">
		<label>Locatie:</label>
		<input type="text" class="form-control" name="locatie" value="<?php echo $row["artlocatie"]; ?>">
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
	<input class="btn btn-primary" type='submit' name='insert' value='Updaten'>

</form>

	<a href='artikelen'>Terug</a>

	<?php
}
?>