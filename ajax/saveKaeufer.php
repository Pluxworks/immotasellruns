<?php
	include "../sql/mysql_connect.php";

	$f_offer_id = $_POST["angebot"];
	$f_charname	= trim($_POST["charname"]);
	$f_class_id = $_POST["klasse"];
	
	$sql_getAngebot = "SELECT name, preis, info FROM angebote WHERE id = '$f_offer_id'";
	$result_getAngebot = mysqli_query($connection, $sql_getAngebot);
	$angebotinfo = mysqli_fetch_array($result_getAngebot);
	
	$sql_neuerKaeufer = "INSERT INTO kaeufer(id,charname,klassen_id,angebot_name,angebot_preis,angebot_info) VALUES('', '$f_charname', '$f_class_id', '$angebotinfo[name]', '$angebotinfo[preis]', '$angebotinfo[info]')";
	$result_neuerKaeufer = mysqli_query($connection, $sql_neuerKaeufer);
	if(!$result_neuerKaeufer) {
		echo "Error kaeufer";
	} else {
		echo "Kaeufer erfolgreich gespeichert";
	}
?>