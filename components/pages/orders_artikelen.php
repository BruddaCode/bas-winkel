<?php
include_once("components/elements/card.php");
include_once("backend/order.php");
include_once("backend/artikel.php");

$card = new elCard();
$order = new order();
$artikel = new artikel();

if (isset($_POST["insert"])) {
	$artikel->insertArtikel($_POST["artikel"], $_POST["aantal"]);
}
?>

<form method="post" action="">
	<input type="submit" name="insert" value="Voeg artikelen toe">
	<div class="row">
		<?php
		$orders = $artikel->selectArtikel();
		while ($row = $orders->fetch()) {
			$card->generateTable("<input type='checkbox' name='artikel' value='{$row["artid"]}'> {$row['artikelenomschrijving']}", "&euro; {$row['artverkoop']} <br> <input type='number' value='1' name='aantal' min='1' max='99'>");
		}
		?>
	</div>
</form>

