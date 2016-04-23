<?php
	include "../sql/mysql_connect.php";

	$f_offer_id = $_POST["angebot"];
	$f_charname	= trim($_POST["charname"]);
	$f_class_id = $_POST["klasse"];
	
	$sql_neuerKaeufer = "INSERT INTO kaeufer(id,charname,klassen_id,angebot_id) VALUES('', '$f_charname', '$f_class_id', '$f_offer_id')";
	$result_neuerKaeufer = mysqli_query($connection, $sql_neuerKaeufer);
	if(!$result_neuerKaeufer) {
		echo "Error kaeufer";
	} else {
		echo "Kaeufer erfolgreich gespeichert";
	}
?>