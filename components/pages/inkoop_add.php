<?php
include_once "backend/inkoop.php";
include_once "backend/leverancier.php";
$inkoop = new inkoop();
$leverancier = new leverancier();

if (isset($_POST['insert'])) {

    $datum = date("Y-m-d");

    if ($inkoop->insertInkoop($_POST['lev'], $datum, $_POST['status'])) {
        header("Location:./inkoop?message=1");
        exit;
    } else {
        echo "Kan inkoop order niet plaatsen.";
    }
}
?>


<p class="lead display-4">Inkoop toevoegen</p>
<hr>
<form method='post' action='inkoop_add'>
	<div class="form-group">
		<label>Select leverancier:</label>
		<select class="form-control" name="lev">
			<?php
$klanten = $leverancier->selectLeverancier();
while ($row = $klanten->fetch()) {
    $levid = $row['levid'];
    $levnaam = $row['levnaam'];
    echo "<option value=$levid>$levnaam (id: $levid)</option>";
}
?>
		</select>
	</div>

	<div class="form-group">
		<label>Status:</label>
		<div class="form-inline">
			<div class="form-group mr-2">
				<select class="form-control" name="status">
					<option value="0">Order niet ontvangen</option>
					<option value="1">Order ontvangen</option>
				</select>
			</div>

		</div>
	</div>

	<input class="btn btn-primary" type='submit' name='insert' value='Verzenden'>

</form>