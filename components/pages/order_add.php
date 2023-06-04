<?php
include_once("backend/order.php");
$order = new order();

if (isset($_POST['insert'])) {

	$datum = date("Y-m-d");

	if ($order->insertOrder($_POST['klant'], $datum, $_POST['status'])) {
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
		<label>Status:</label>
		<div class="form-inline">
			<div class="form-group mr-2">
				<select class="form-control" name="status">
					<option value="0">Order is gezet</option>
					<option value="1">Magazijn werker pakt artikelen</option>
					<option value="2">Tas met artikelen wordt overhandigt aan bezorger</option>
					<option value="3">Tas is bezorgd en ontvangen</option>
				</select>
			</div>

		</div>
	</div>

	<input class="btn btn-primary" type='submit' name='insert' value='Verzenden'>

</form>