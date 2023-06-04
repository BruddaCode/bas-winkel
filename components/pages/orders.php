<?php
if (isset($_GET["message"])) {
	?>
	<div class="alert alert-success" role="alert">

		<?php
		switch ($_GET["message"]) {
			case 1:
				echo "De bestelling is succesvol gecreëerd.";
				break;
			case 2:
				echo "De bestelling is succesvol verwijdered.";
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

<p class="lead display-4">Orders
	<a href="orders_add" class="btn btn-primary">add</a>
</p>
<hr>

<?php

include_once("backend/order.php");
include_once("components/elements/table.php");

$table = new elTable();
$order = new order();
$table_head = ["Order NR", "Artikel NR", "Klant NR", "Datum", "Aantal", "Status", "Options"];
$table_body = iterator_to_array($order->selectOrders());

// Add options to every item in table body
for ($i = 0; $i < count($table_body); $i++) {
	$options = "<a href='orders_edit?id=" . $table_body[$i]["verkordid"] . "' class='btn btn-warning'>Edit</a> ";
	$options .= "<a href='orders_delete?id=" . $table_body[$i]["verkordid"] . "' class='btn btn-danger'>Delete</a> ";
	array_push($table_body[$i], $options);
}

$table->generateTable($table_head, $table_body);
?>