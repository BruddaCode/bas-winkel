<?php
include_once("backend/order.php");

if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else {

	$order = new order();
?>

	<p class="lead display-4">Order Wijzigen</p>
	<hr>
	<form method="post" action="order_edit">
		<div class="form-group">
			<label>Klant naam:</label>
				<?php
					$row = $order->selectOrders($_GET["id"])->fetch();
					echo "<p>{$row['klantnaam']}</p>";
				?>
		</div>

		<div class="form-group">
			<label>Status:</label>
			<select class="form-control" name="status">
				<option value="0">Order is gezet</option>
				<option value="1">Magazijn werker pakt artikelen</option>
				<option value="2">Tas met artikelen wordt overhandigt aan bezorger</option>
				<option value="3">Tas is bezorgd en ontvangen</option>
			</select>
		</div>


		<input type='submit' name='insert' value='Update'>
	</form></br>

	<a href='orders'>Terug</a>

<?php
}
?>