<?php
include_once("backend/inkoop.php");
$inkoop = new inkoop();


if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else if (isset($_GET["confirm"]) && $_GET["confirm"] == true) {
	$inkoop->deleteInkoop($_GET["id"]);
	header("Location:./inkoop?message=2");
} else {
	?>
		<h1>Delete item?</h1>
		<h3>Are you sure you wanna delete this item?</h3>
		<a href="./inkoop" class="btn btn-secondary">Go back</a> <a
			href="./inkoop_delete?id=<?php echo $_GET["id"]; ?>&confirm=true" class="btn btn-danger">I'm sure, delete</a>

	<?php
}
?>