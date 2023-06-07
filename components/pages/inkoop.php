<?php

include_once("backend/inkoop.php");
include_once("components/elements/table.php");


if (isset($_GET["message"])) {
	?>
	<div class="alert alert-success" role="alert">

		<?php
		switch ($_GET["message"]) {
			case 1:
				echo "De inkoop order is succesvol gecreëerd.";
				break;
			case 2:
				echo "De inkoop order is succesvol verwijdered.";
				break;
			case 3:
				echo "De inkoop order is succesvol geupdate.";
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

<p class="lead display-4">Inkoop
	<a href="inkoop_add" class="btn btn-primary">Toevoegen</a>
</p>
<hr>

<?php


$table = new elTable();
$inkoop = new inkoop();
$table_head = ["NR", "Leverancier", "Datum", "Status", "Options"];
$table_body = iterator_to_array($inkoop->selectInkoop());

// Add options to every item in table body
for ($i = 0; $i < count($table_body); $i++) {
	if ($table_body[$i][3] == 0) {
		$table_body[$i][3] = "Order niet ontvangen.";
	} else if ($table_body[$i][3] == 1) {
		$table_body[$i][3] = "Order ontvangen.";
	} else {
		$table_body[$i][3] = "Onbekende status.";
	}

	$options = "<a href='#' class='btn btn-info disabled'>Select artikelen(disabled)</a> ";
	$options .= "<a href='inkoop_edit?id=" . $table_body[$i]["inkordid"] . "' class='btn btn-warning'>Edit metadata</a> ";
	$options .= "<a href='inkoop_delete?id=" . $table_body[$i]["inkordid"] . "' class='btn btn-danger'>Delete</a> ";
	array_push($table_body[$i], $options);
}

$table->generateTable($table_head, $table_body);
?>