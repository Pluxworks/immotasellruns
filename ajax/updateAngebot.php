<?php 
include "../sql/mysql_connect.php";

$angebot_id = $_POST["angebotId"];
$name = $_POST["name"];
$preis = $_POST["preis"];
$info = $_POST["info"];
$raid_id = $_POST["raidId"];
echo $angebot_id;
$sql_angebot = "UPDATE angebote SET name = '$name', preis = '$preis', info = '$info', raid_id = '$raid_id' WHERE id = $angebot_id";

$result_updateAngebot = mysqli_query($connection, $sql_angebot);
echo mysql_error();
if(!$result_updateAngebot) {
	echo "Angebot Error";
	
	} else {
		echo "Angebot erfolgreich geupdatet";
	}


?>