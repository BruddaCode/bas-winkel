<?php
include_once("backend/klant.php");
$klant = new klant();

if (isset($_POST['insert'])) {


	if ($klant->insertKlant($_POST["naam"], $_POST["email"], $_POST["adres"], $_POST["postcode"], $_POST["plaats"])) {
		header("Location:./klanten?message=1");
		exit;
	} else {
		echo "Kan Klant niet toevoegen.";
	}
}
?>


<p class="lead display-4">Klant toevoegen</p>
<hr>
<form method='post' action='klanten_add'>
	<div class="form-group">
		<label>Naam:</label>
		<input type="text" class="form-control" name="naam">
	</div>

	<div class="form-group">
		<label>Email:</label>
		<input type="email" class="form-control" name="email">
	</div>

	<div class="form-group">
		<label>Adres:</label>
		<input type="text" class="form-control" name="adres">
	</div>

	<div class="form-group">
		<label>Postcode:</label>
		<input type="text" class="form-control" name="postcode">
	</div>

	<div class="form-group">
		<label>Plaats:</label>
		<input type="text" class="form-control" name="plaats">
	</div>
	<input class="btn btn-primary" type='submit' name='insert' value='Verzenden'>

</form>