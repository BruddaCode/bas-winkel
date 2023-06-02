<?php

class elTable
{

	function generateTable($head, $body)
	{
		echo "<table class=\"table\">";
		echo "<thead><tr>";

		foreach ($head as &$t_head) {
			echo "<th scope=\"col\">";
			echo $t_head;
			echo "</th>";
		}

		echo "</thead><tbody>";
		foreach ($body as &$t_body) {
			echo "<tr>";
			for ($i = 0; $i < count($head); $i++) {
				echo "<td>";
				if (isset($t_body[$i]))
					echo $t_body[$i];
				echo "</td>";
			}
			echo "</tr>";
		}

		echo "<tbody></table>";

	}

}

?>