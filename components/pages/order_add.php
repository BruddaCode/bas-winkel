<?php
include_once("backend/order.php");
$order = new order();

if (isset($_POST['insert'])) {

	$datum = date("Y-m-d");

	if ($order->insertOrder($_POST['product'], $_POST['klant'], $datum, $_POST['aantal'], 0)) {
		header("Location:./orders?message=1");
		exit;
	} else {
		echo "Kan order niet plaatsen.";
	}
}
?>


<p class="lead display-4">Order toevoegen</p>
<hr>
<form method='post' action='orders_add'>
	<div class="form-group">
		<label>Select klant:</label>
		<select class="form-control" name="klant">
			<?php
			$orders = $order->selectKlanten();
			while ($row = $orders->fetch()) {
				$klantId = $row['klantid'];
				$klantNaam = $row['klantnaam'];
				echo "<option value=$klantId>$klantNaam (id: $klantId)</option>";
			}
			?>
		</select>
	</div>

	<div class="form-group">
		<label>Product:</label>
		<div class="form-inline">

			<div class="form-group mr-2">
				<input type="number" class="form-control" name="aantal" value="1" min="1" max="99">
			</div>

			<div class="form-group mr-2">
				<select class="form-control" name="product">
					<?php
					$orders = $order->selectArtikelen();
					while ($row = $orders->fetch()) {
						$artId = $row['artid'];
						$artOmschrijving = $row['artikelenomschrijving'];
						$artVerkoop = $row['artverkoop'];
						echo "<option value='$artId'>$artOmschrijving (&euro; $artVerkoop)</option>";
					}

					?>

				</select>
			</div>

		</div>
	</div>

	<input class="btn btn-primary" type='submit' name='insert' value='Verzenden'>

</form>