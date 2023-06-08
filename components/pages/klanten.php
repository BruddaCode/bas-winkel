<?php

include_once "backend/klant.php";
include_once "components/elements/table.php";

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

$q = "";
if (isset($_GET["q"]))
    $q = $_GET["q"];

?>

<p class="lead display-4">Klanten
    <a href="klanten_add" class="btn btn-primary">Toevoegen</a>
</p>
<hr>

<form action="klanten">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Zoek naar klant" name="q"
            value="<?php echo $q; ?>">
        <div class="input-group-append">
            <input class="btn btn-outline-secondary" type="submit" value="Zoek">

        </div>
    </div>
</form>

<?php

$table = new elTable();
$klant = new Klant();
$table_head = ["NR", "Naam", "email", "adres", "postcode", "plaats", "Options"];

if (isset($_GET["q"])) {
    $table_body = $klant->selectSearch($_GET["q"]);
} else {
    $table_body = $klant->selectKlant();
}


$table_body = iterator_to_array($table_body);

// Add options to every item in table body
for ($i = 0; $i < count($table_body); $i++) {

    $options = "<a href='klanten_edit?id=" . $table_body[$i]["klantid"] . "' class='btn btn-warning'>Edit</a> ";
    $options .= "<a href='klanten_delete?id=" . $table_body[$i]["klantid"] . "' class='btn btn-danger'>Delete</a> ";
    array_push($table_body[$i], $options);
}

$table->generateTable($table_head, $table_body);
?>