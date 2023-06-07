<?php
include_once("backend/order.php");
$order = new order();


if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else if (isset($_GET["confirm"]) && $_GET["confirm"] == true) {
	$order->deleteOrder($_GET["id"]);
	header("Location:./orders?message=2");
} else {
	?>
		<h1>Delete item?</h1>
		<h3>Are you sure you wanna delete this item?</h3>
		<a href="./orders" class="btn btn-secondary">Go back</a> <a
			href="./orders_delete?id=<?php echo $_GET["id"]; ?>&confirm=true" class="btn btn-danger">I'm sure, delete</a>

	<?php
}
?>