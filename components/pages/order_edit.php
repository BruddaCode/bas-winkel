<?php
include_once("backend/order.php");

if (!isset($_GET["id"]) || strlen($_GET["id"]) == 0) {
	echo "Error: id has not been set.";
} else {
	$order = new order();
	$row = $order->selectOrders($_GET["id"]);
	$row = $row->fetch();
	?>
	<h1>Edit Order</h1>
	<hr>
	<form method="post" action="order_edit">
			<br>   
		<label for="an">Artkel:</label>
		<input type="text" id="" name="artikel" placeholder="artikel" value="<?php echo $row['artid']; ?>" required/>
			<br>
		<label for="an">Aantal:</label>
		<input type="text" id="" name="aantal" placeholder="aantal" value="<?php echo $row['verkordbestaantal']; ?>" required/>
			<br>
		<label for="an">Status:</label>
		<input type="text" id="" name="status" placeholder="status" value="<?php echo $row['verkordstatus']; ?>" required/>
			<br><br>
		<input type='submit' name='insert' value='Update'>
	</form></br>

	<a href='orders'>Terug</a>

	<?php
}
?>