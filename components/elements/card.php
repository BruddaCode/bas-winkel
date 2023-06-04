<?php
class elCard{

	function generateTable($title, $body, $img = false)
	{
		echo "<div class='col-sm-3' style='padding:6px'><div class='card'>";
		if($img) echo "<img src='" . $img . "' class='card-img-top'>";
		echo "<div class='card-body'>";
		echo"<h5 class='card-title'>" . $title . "</h5>";
		echo"<p class='card-text'>" . $body . "</p>";
		echo "</div></div></div>";

	}

}

?>