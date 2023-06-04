<?php

include_once("backend/leverancier.php");
include_once("components/elements/table.php");


if (isset($_GET["message"])) {
	?>
	<div class="alert alert-success" role="alert">

		<?php
		switch ($_GET["message"]) {
			case 1:
				echo "De leverancier is succesvol gecreëerd.";
				break;
			case 2:
				echo "De leverancier is succesvol verwijdered.";
				break;
			case 3:
				echo "De leverancier is succesvol geupdate.";
				break;
			default:
				echo "Niet bekende notificatie.";
				break;

		}

		?>


	</div>

	<?php
}
?>

<p class="lead display-4">Leveranciers
	<a href="orders_add" class="btn btn-primary">Toevoegen</a>
</p>
<hr>

<?php


$table = new elTable();
$order = new leverancier();
$table_head = ["NR", "Naam", "Contact", "email", "adres", "postcode", "plaats", "Options"];
$table_body = iterator_to_array($order->selectLeverancier());

// Add options to every item in table body
for ($i = 0; $i < count($table_body); $i++) {

	$options = "<a href='leveranciers_edit?id=" . $table_body[$i]["levid"] . "' class='btn btn-warning'>Edit</a> ";
	$options .= "<a href='leveranciers_delete?id=" . $table_body[$i]["levid"] . "' class='btn btn-danger'>Delete</a> ";
	array_push($table_body[$i], $options);
}

$table->generateTable($table_head, $table_body);
?>