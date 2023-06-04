<?php
    include_once("backend/klant.php");
    $klant = new Klant();

    if (isset($_POST['insert'])) {
        if($klant->insertKlant($_POST['klantnaam'], $_POST['klantemail'], $_POST['klantadres'], $_POST['klantpostcode'], $_POST['klantwoonplaats'])){
			print("Successfully registered.");
		} else {
			print("Username or Email already exist.");
		}
    }

?>

<!DOCTYPE html>
<html>
<body>

	<h1>Klant</h1>
	<h2>Toevoegen</h2>
	<form method="post" action="klanten">
        <br>   
    <label for="an">Klantnaam:</label>
    <input type="text" id="" name="klantnaam" placeholder="klantnaam" required/>
        <br>
    <label for="an">Klantemail:</label>
    <input type="text" id="" name="klantemail" placeholder="klantemail" required/>
        <br>
    <label for="an">Klantadres:</label>
    <input type="text" id="" name="klantadres" placeholder="klantadres" required/>
        <br>
    <label for="an">Klantpostcode:</label>
    <input type="text" id="" name="klantpostcode" placeholder="klantpostcode" required/>
        <br>
    <label for="an">Klantwoonplaats:</label>
    <input type="text" id="" name="klantwoonplaats" placeholder="klantwoonplaats" required/>
        <br><br>
    <input type='submit' name='insert' value='Toevoegen'>
    </form></br>

	<a href='index.php'>Terug</a>

</body>
</html>



