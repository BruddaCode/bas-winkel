<?php
include_once("backend/klant.php");
$klant = new Klant();

if (isset($_POST['insert'])) {

	if ($klant->updateKlant($_GET["id"], $_POST["naam"], $_POST["email"], $_POST["adres"], $_POST["postcode"], $_POST["plaats"])) {
		header("Location:./klanten?message=3");
		exit;
	} else {
		echo "Kan klant niet plaatsen.";
	}
}

if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else {
	$row = $klant->selectKlant($_GET["id"])->fetch();

	?>

	<p class="lead display-4">Klant Wijzigen</p>
	<hr>
	<form method="post" action="klanten_edit?id=<?php echo $_GET['id'] ?>">

		<div class="form-group">
			<label>Naam:</label>
			<input type="text" class="form-control" name="naam" value="<?php echo $row["klantnaam"]; ?>">
		</div>

		<div class="form-group">
			<label>email:</label>
			<input type="email" class="form-control" name="email" value="<?php echo $row["klantemail"]; ?>">
		</div>

		<div class="form-group">
			<label>adres:</label>
			<input type="text" class="form-control" name="adres" value="<?php echo $row["klantadres"]; ?>">
		</div>

		<div class="form-group">
			<label>postcode:</label>
			<input type="text" class="form-control" name="postcode" value="<?php echo $row["klantpostcode"]; ?>">
		</div>

		<div class="form-group">
			<label>plaats:</label>
			<input type="text" class="form-control" name="plaats" value="<?php echo $row["klantwoonplaats"]; ?>">
		</div>



		<input type='submit' name='insert' value='Update'>
	</form></br>

	<a href='klants'>Terug</a>

	<?php
}
?>