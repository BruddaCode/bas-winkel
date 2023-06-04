<?php
include_once("components/elements/card.php");
include_once("backend/order.php");

$card = new elCard();
?>
<div class="row">


	<?php
	$order = new order();

	$orders = $order->selectArtikelen();
	while ($row = $orders->fetch()) {
		$card->generateTable($row['artikelenomschrijving'], "&euro; " . $row['artverkoop'] . "");
	}
	?>


</div>