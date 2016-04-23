<?php
	include "../sql/mysql_connect.php";
	$sql_angebote = "SELECT id, name, preis, info FROM angebote";
	$result_angebote = mysqli_query($connection, $sql_angebote);
	echo "<table id=\"angebotliste\">";
	echo "<tr>";
	echo "<td class=\"tdhead\">Angebotsname</td>";
	echo "<td class=\"tdhead\">Preis</td>";
	echo "<td class=\"tdhead\">Information</td>";
	echo "<td class=\"tdhead\"></td>";
	echo "<td class=\"tdhead\"></td>";
	echo "</tr>";
	while($c = mysqli_fetch_array($result_angebote)) {
	echo "<tr id=\"" . $c["id"] . "\">";
	echo "<td id=\"a" . $c["id"] . "\" class=\"tdlist\">" . utf8_encode($c["name"]) . "</td>";
	echo "<td id=\"b" . $c["id"] . "\" class=\"tdlist\">" . utf8_encode($c["preis"]) . "</td>";
	echo "<td id=\"c" . $c["id"] . "\" class=\"tdlist\">" . utf8_encode($c["info"]) . "</td>";
	echo "<td id=\"d" . $c["id"] . "\" class=\"tdlist\"><img id=\"d" . $c["id"] . "\" class=\"tableclassicon\" src=\"css/images/edit.png\"></img></td>";
	echo "<td id=\"e" . $c["id"] . "\" class=\"tdlist\"><img id=\"e" . $c["id"] . "\" class=\"tableclassicon\" src=\"css/images/delete.ico\"></img></td>";
	echo "</tr>";
	}
	echo "<tr>";
	echo "<td colspan=\"5\" id=\"addtd\"><img id=\"addAngebot\" class=\"tableclassicon\" src=\"css/images/add.png\"></img><img</td>";
	echo "</tr>";
	echo "</table>";
			
	?>