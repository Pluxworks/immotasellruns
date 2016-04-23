<?php
include "../sql/mysql_connect.php";

$angebot_id = $_POST["angebot_id"];
$result_raidId = mysqli_query($connection, "SELECT a.id, a.name, a.preis, a.info, a.raid_id, r.kuerzel FROM angebote a LEFT JOIN raid r ON a.raid_id = r.id WHERE a.id = $angebot_id");
$raid = mysqli_fetch_assoc($result_raidId);



echo "<table id=\"be-\" class=\"tableangebot\">";
	echo "<thead id=\"angebotTH\">";
	echo "<tr id=\"angebotTR\">";
	echo "<th>Name</th>";
	echo "<th>Preis</th>";
	echo "<th>Information</th>";
	echo "<th>Raid</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
		echo "<tr id=\"bearbeiten\">";
		echo "<td id=\"angebotId\" value=\"\" style=\"display:none\">" . $angebot_id . "</td>";
		echo "<td><input type=\"text\" name=\"name\" id=\"name\" value=\"" . utf8_encode($raid["name"]) . "\"></input></td>";
		echo "<td><input type=\"text\" name=\"preis\" id=\"preis\" value=\"" . $raid["preis"] . "\"></input></td>";
		echo "<td><input type=\"text\" name=\"info\" id=\"info\" value=\"" . utf8_encode($raid["info"]) . "\"></input></td>";
		echo "<td>";
		echo "<select id=\"angebotRaid\" name=\"angebotRaid\">";
		echo "option />";
			$ausgabe_raid = mysqli_query($connection, "SELECT id, name, kuerzel FROM raid");
			while ($arr = mysqli_fetch_array($ausgabe_raid)) {
					echo "<option value=\"" . $arr["id"] . "\">" . " " . utf8_encode($arr["name"]) . ", ". $arr["kuerzel"] . "</option>\n";
			}
		echo "</td></tr>";
	echo "</tbody></table>";

	
?>