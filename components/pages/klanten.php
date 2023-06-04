<?php

include_once("backend/klant.php");
include_once("components/elements/table.php");


if (isset($_GET["message"])) {
	?>
	<div class="alert alert-success" role="alert">

		<?php
		switch ($_GET["message"]) {
			case 1:
				echo "De klant is succesvol gecreëerd.";
				break;
			case 2:
				echo "De klant is succesvol verwijdered.";
				break;
			case 3:
				echo "De klant is succesvol geupdate.";
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

<p class="lead display-4">Klanten
	<a href="klanten_add" class="btn btn-primary">Toevoegen</a>
</p>
<hr>

<?php


$table = new elTable();
$klant = new Klant();
$table_head = ["NR", "Naam", "email", "adres", "postcode", "plaats", "Options"];
$table_body = iterator_to_array($klant->selectKlant());

// Add options to every item in table body
for ($i = 0; $i < count($table_body); $i++) {

	$options = "<a href='klanten_edit?id=" . $table_body[$i]["klantid"] . "' class='btn btn-warning'>Edit</a> ";
	$options .= "<a href='klanten_delete?id=" . $table_body[$i]["klantid"] . "' class='btn btn-danger'>Delete</a> ";
	array_push($table_body[$i], $options);
}

$table->generateTable($table_head, $table_body);
?>