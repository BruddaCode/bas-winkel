<?php

    if (isset($_POST['insert'])) {
        require_once '..\backend\order.php';
        $datum = date("Y-m-d");
        $order = new order();
        if($order->insertOrder($_POST['klant'], $_POST['product'], $_POST['aantal'], $datum)){
			print("Order is geplaatst.");
		}
    }
?>

<!DOCTYPE html>
<html>
<body>

	<h1>Order</h1>
	<h2>Maken</h2>
	
    <?php
    echo "<form method='post' action='verkooporderformulier.php'>";
    echo "Klant: </br><select id='klant'>";
    while($row = $order->selectKlanten()->fetch()) {
        $klantId = $row['klantId'];
        $klantNaam = $row['klantNaam'];
        echo "<option value=$klantId>$klantNaam (id: $klantId)</option>";    
    }
    echo "</select></br>";
    
    echo "</br>Product: </br><select id='aantal'>";
    for ($num=1; $num<=10; $num++){
    echo '<option>' .$num. '</option>';
    }
    echo "</select></br>";

    echo "<select id='product'>";
    while($row2 = $stmt2->fetch()) {
        $artId = $row2['artId'];
        $artOmschrijving = $row2['artOmschrijving'];
        $artVerkoop = $row2['artVerkoop'];    
        echo "<option value=$artId>$artOmschrijving (&euro; $artVerkoop)</option>";    
    }
    echo "</select>";
    echo "<p><input type='submit' value='Verzenden'></p>";
    echo "</form></br>";
    ?>    

	<a href='index.php'>Terug</a>

</body>
</html>



