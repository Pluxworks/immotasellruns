<?php
include "../sql/mysql_connect.php";

$benutzername = $_POST["benutzername"];
$passwort = $_POST["passwort"];

$f_passwort = md5($passwort);

	// Benutzer anlegen
	$sql_benutzer = "INSERT INTO benutzer (id, benutzername, passwort) VALUES ('', '$benutzername', '$f_passwort' )";
	$result_benutzer = mysqli_query($connection, $sql_benutzer);
	if(!$result_benutzer) {
		echo "Error Benutzer";
		
	} else {
		echo "Benutzer erfolgreich gespeichert";
	}

?>