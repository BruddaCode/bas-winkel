<?php
include_once("components/elements/card.php");
include_once("backend/order.php");

$card = new elCard();
$order = new order();
?>

<form method="post" action="">
	<div class="row">
		<?php
		$orders = $order->selectArtikelen();
		while ($row = $orders->fetch()) {
			echo "<input type='checkbox' name='artikel' value='{$row["artid"]}'>";
			$card->generateTable($row['artikelenomschrijving'], "&euro; {$row['artverkoop']}");
		}
		?>
	</div>
</form>

