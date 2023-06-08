<?php

include_once("backend/artikel.php");
include_once("components/elements/table.php");


if (isset($_GET["message"])) {
	?>
	<div class="alert alert-success" role="alert">

		<?php
		switch ($_GET["message"]) {
			case 1:
				echo "De artikel is succesvol gecreëerd.";
				break;
			case 2:
				echo "De artikel is succesvol verwijdered.";
				break;
			case 3:
				echo "De artikel is succesvol geupdate.";
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

<p class="lead display-4">Artikelen
	<a href="artikelen_add" class="btn btn-primary">Toevoegen</a>
</p>
<hr>

<?php


$table = new elTable();
$artikel = new artikel();
$table_head = ["NR", "Omschrijving", "Inkoop", "Verkoop", "Voorraad", "Minvoorraad", "Maxvoorraad", "Locatie", "Leverancier", "Options"];
$table_body = iterator_to_array($artikel->selectArtikel());

// Add options to every item in table body
for ($i = 0; $i < count($table_body); $i++) {

	$options = "<a href='artikelen_edit?id=" . $table_body[$i]["artid"] . "' class='btn btn-warning'>Edit</a> ";
	$options .= "<a href='artikelen_delete?id=" . $table_body[$i]["artid"] . "' class='btn btn-danger'>Delete</a> ";
	array_push($table_body[$i], $options);
}

$table->generateTable($table_head, $table_body);
?>