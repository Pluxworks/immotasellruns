<?php
	include "../sql/mysql_connect.php";
	
	
	
	$sql_benutzer = "SELECT id, benutzername FROM benutzer";
	$result_benutzer = mysqli_query($connection, $sql_benutzer);
	echo "<table id=\"benutzerliste\">";
	echo "<tr>";
	echo "<td class=\"tdhead\">Benutzername</td>";
	echo "<td class=\"tdhead\">Kennwort</td>";
	echo "<td class=\"tdhead\"></td>";
	echo "</tr>";
	while($c = mysqli_fetch_array($result_benutzer)) {
	echo "<tr id=\"" . $c["id"] . "\">";
	echo "<td id=\"a" . $c["id"] . "\" class=\"tdlist\">" . utf8_encode($c["benutzername"]) . "</td>";
	echo "<td id=\"b" . $c["id"] . "\" class=\"tdlist\">************</td>";
	if($c["benutzername"] != "Admin") {
	echo "<td id=\"c" . $c["id"] . "\" class=\"tdlist\"><img id=\"c" . $c["id"] . "\" class=\"tableclassicon\" src=\"css/images/delete.ico\"></img></td>";
	} else {
	echo "<td id=\"c" . $c["id"] . "\" class=\"tdlist\"><img id=\"\" class=\"tableclassicon\" src=\"css/images/delete_no.png\"></img></td>";
	}
	echo "</tr>";
	}
	echo "<tr>";
	echo "<td colspan=\"5\" id=\"addtd\"><img id=\"addBenutzer\" class=\"tableclassicon\" src=\"css/images/add.png\"></img><img</td>";
	echo "</tr>";
	echo "</table>";
			
	?>