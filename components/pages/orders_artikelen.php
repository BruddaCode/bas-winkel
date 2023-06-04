<?php
include_once("components/elements/card.php");
include_once("backend/order.php");

$card = new elCard();
$order = new order();

if (isset($_POST["insert"])) {
	$order->insertArtikelen($_POST["artikel"], $_POST["aantal"]);
}
?>

<form method="post" action="">
	<input type="submit" name="insert" value="Voeg artikelen toe">
	<div class="row">
		<?php
		$orders = $order->selectArtikelen();
		while ($row = $orders->fetch()) {
			$card->generateTable("<input type='checkbox' name='artikel' value='{$row["artid"]}'> {$row['artikelenomschrijving']}", "&euro; {$row['artverkoop']} <br> <input type='number' value='1' name='aantal' min='1' max='99'>");
		}
		?>
	</div>
</form>

