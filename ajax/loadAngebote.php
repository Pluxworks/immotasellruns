<?php
include "../sql/mysql_connect.php";
$raid_id = $_POST["id"];

$sql_angebote = "SELECT id, name, preis, info  FROM angebote WHERE raid_id = '$raid_id' ";
$result_angebote = mysqli_query($connection, $sql_angebote);

if (mysqli_num_rows($result_angebote)==0){
	echo "Folgende Angebote stehen zur Auswahl:<br><br>";
	echo "Aktuell gibt es keine Angebote für diesen Raid.";
} else {

echo "Folgende Angebote stehen zur Auswahl:<br><br>";
while($c = mysqli_fetch_array($result_angebote)) {
echo "<div class=\"offerdiv\"><input name=\"angebotauswahl\" type=\"radio\" value=\"" . $c["id"] . "\" id=\"" . $c["id"] . "\"><label title=\"" . utf8_encode($c["info"]) . "\" for=\"" . $c["id"] . "\">" . utf8_encode($c["name"]) . ", Preis: " . $c["preis"] ."</label></input></div><br>";
} 
}
?>