<?php
include_once("backend/leverancier.php");
$leverancier = new leverancier();

if (isset($_POST['insert'])) {

	if ($leverancier->updateLeverancier($_GET["id"], $_POST["naam"], $_POST["contact"], $_POST["email"], $_POST["adres"], $_POST["postcode"], $_POST["plaats"])) {
		header("Location:./leveranciers?message=3");
		exit;
	} else {
		echo "Kan leverancier niet plaatsen.";
	}
}

if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else {
	$row = $leverancier->selectLeverancier($_GET["id"])->fetch();

	?>

	<p class="lead display-4">Leverancier Wijzigen</p>
	<hr>
	<form method="post" action="leveranciers_edit?id=<?php echo $_GET['id'] ?>">

		<div class="form-group">
			<label>Naam:</label>
			<input type="text" class="form-control" name="naam" value="<?php echo $row["levnaam"]; ?>">
		</div>

		<div class="form-group">
			<label>Contact:</label>
			<input type="text" class="form-control" name="contact" value="<?php echo $row["levcontact"]; ?>">
		</div>

		<div class="form-group">
			<label>email:</label>
			<input type="email" class="form-control" name="email" value="<?php echo $row["levemail"]; ?>">
		</div>

		<div class="form-group">
			<label>adres:</label>
			<input type="text" class="form-control" name="adres" value="<?php echo $row["levadres"]; ?>">
		</div>

		<div class="form-group">
			<label>postcode:</label>
			<input type="text" class="form-control" name="postcode" value="<?php echo $row["levpostcode"]; ?>">
		</div>

		<div class="form-group">
			<label>plaats:</label>
			<input type="text" class="form-control" name="plaats" value="<?php echo $row["levwoonplaats"]; ?>">
		</div>



		<input type='submit' name='insert' value='Update'>
	</form></br>

	<a href='leveranciers'>Terug</a>

	<?php
}
?>