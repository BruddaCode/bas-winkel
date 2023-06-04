<?php
include_once("components/elements/card.php");

$card = new elCard();
?>
<div class="row">


	<?php

	$card->generateTable("Appel", "");
	$card->generateTable("Banaan", "");
	$card->generateTable("Kiwi", "");

	?>


</div>