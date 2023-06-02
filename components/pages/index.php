<h1>Dashboard</h1>
<?php
include_once("components/elements/table.php");
$table = new elTable();


$head = ["id", "product", "price"];

$body = array(
	["0", "Banaan", "2,50"],
	["1", "Appel", "0,75", "Overflow"],
	["3", "Something"]
);

$table->generateTable($head, $body)


?>