<?php

    include_once 'crud.php';
    include_once 'order.php';

    class orderzien extends order{
        function selectOrders()
        {
            $object = $this->select("verkooporders", "*");
            return $object;
        }

    }

    echo "<table border='1'>";
    echo "<tr><th>Order ID</th><th>Artikel ID</th><th>Klant ID</th><th>Datum</th><th>Aantal</th><th>Status</th></tr>";
    while($row = $object->fetch()) {
        $orderid = $row['verkordid'];
        $artid = $row['artid'];
        $klantid = $row['klantid'];
        $verkorddatum = $row['verkorddatum'];
        $verkordbestaantal = $row['verkordbestaantal'];
        $verkordstatus = $row['verkordstatus'];
        echo "<tr><td>$orderid</td><td>$artid</td><td>$klantid</td><td>$verkorddatum</td><td>$verkordbestaantal</td><td>$verkordstatus</td></tr>";
    }
    echo "</table>";
