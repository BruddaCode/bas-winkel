<?php


include_once("backend/order.php");

include_once("components/elements/table.php");



$table = new elTable();
$order = new order();
$table_head = ["Order NR", "Artikel NR", "Klant NR", "Datum", "Aantal", "Status"];
$table_body = 

$table->generateTable($table_head, $table_body);

?>