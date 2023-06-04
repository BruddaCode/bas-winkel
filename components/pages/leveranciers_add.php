<?php
include_once("backend/leverancier.php");
$leverancier = new leverancier();

if (isset($_POST['insert'])) {


	if ($leverancier->insertLeverancier($_POST["naam"], $_POST["contact"], $_POST["email"], $_POST["adres"], $_POST["postcode"], $_POST["plaats"])) {
		header("Location:./leveranciers?message=1");
		exit;
	} else {
		echo "Kan leverancier niet plaatsen.";
	}
}
?>


<p class="lead display-4">Leverancier toevoegen</p>
<hr>
<form method='post' action='leveranciers_add'>
	<div class="form-group">
		<label>Naam:</label>
		<input type="text" class="form-control" name="naam">
	</div>

	<div class="form-group">
		<label>Contact:</label>
		<input type="text" class="form-control" name="contact">
	</div>

	<div class="form-group">
		<label>email:</label>
		<input type="email" class="form-control" name="email">
	</div>

	<div class="form-group">
		<label>adres:</label>
		<input type="text" class="form-control" name="adres">
	</div>

	<div class="form-group">
		<label>postcode:</label>
		<input type="text" class="form-control" name="postcode">
	</div>

	<div class="form-group">
		<label>plaats:</label>
		<input type="text" class="form-control" name="plaats">
	</div>
	<input class="btn btn-primary" type='submit' name='insert' value='Verzenden'>

</form>