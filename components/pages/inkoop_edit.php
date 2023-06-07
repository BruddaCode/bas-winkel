<?php
include_once "backend/inkoop.php";
$inkoop = new inkoop();

if (isset($_POST['insert'])) {

    if ($inkoop->updateInkoop($_POST['status'], $_GET["id"])) {
        header("Location:./inkoop?message=3");
        exit;
    } else {
        echo "Kan order niet plaatsen.";
    }
}

if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
    echo "Error: id has not been set.";
} else {

    ?>

	<p class="lead display-4">Inkoop Wijzigen</p>
	<hr>
	<form method="post" action="inkoop_edit?id=<?php echo $_GET['id'] ?>">
		<div class="form-group">
			<label>Leverancier naam:</label>
				<?php
$row = $inkoop->selectInkoop($_GET["id"])->fetch();
    echo "<p>{$row['levnaam']}</p>";
    ?>
		</div>

		<div class="form-group">
			<label>Status:</label>
			<select class="form-control" name="status">
			<option value="0">Order niet ontvangen</option>
					<option value="1">Order ontvangen</option>
			</select>
		</div>


		<input type='submit' name='insert' value='Update'>
	</form></br>

	<a href='inkoop'>Terug</a>

<?php
}
?>