<?php
include_once("backend/order.php");
$order = new order();

if (isset($_POST['insert'])) {

	$datum = date("Y-m-d");

	if ($order->insertOrder($_POST['klant'], $_POST['product'], $_POST['aantal'], $datum, $num)) {
		print("Order is geplaatst.");
	}
}
?>

<!DOCTYPE html>
<html>

<body>

	<h1>Order</h1>
	<h2>Maken</h2>

	<?php
	echo "<form method='post' action='orders_add'>";

	echo "Klant: </br><select id='klant'>";
	$orders = $order->selectKlanten();
	while ($row = $orders->fetch()) {
		$klantId = $row['klantid'];
		$klantNaam = $row['klantnaam'];
		echo "<option value=$klantId>$klantNaam (id: $klantId)</option>";
	}
	echo "</select></br>";

	echo "</br>Product: </br><select id='aantal'>";
	for ($num = 1; $num <= 10; $num++) {
		echo '<option>' . $num . '</option>';
	}
	echo "</select></br>";

	echo "<select id='product'>";
    $orders2 = $order->selectArtikelen();
	while ($row2 = $orders2->fetch()) {
		$artId = $row2['artid'];
		$artOmschrijving = $row2['artikelenomschrijving'];
		$artVerkoop = $row2['artverkoop'];
		echo "<option value=$artId>$artOmschrijving (&euro; $artVerkoop)</option>";
	}
	echo "</select>";
	echo "<p><input type='submit' value='Verzenden'></p>";
	echo "</form></br>";
	?>

	<a href='index.php'>Terug</a>

</body>

</html>