<h1>Orders:</h1>
<a href="orders_add" class="btn btn-primary">add</a>


<?php

include_once("backend/order.php");
include_once("components/elements/table.php");


$table = new elTable();
$order = new order();
$table_head = ["Order NR", "Artikel NR", "Klant NR", "Datum", "Aantal", "Status", "Options"];
$table_body = iterator_to_array($order->selectOrders());

// Add options to every item in table body
for ($i = 0; $i < count($table_body); $i++) {
	$options = "<a href='orders_edit?id=" . $i . "' class='btn btn-warning'>Edit</a> ";
	$options .= "<a href='orders_delete?id=" . $i . "' class='btn btn-danger'>Delete</a> ";
	array_push($table_body[$i], $options);
}

$table->generateTable($table_head, $table_body);

?>