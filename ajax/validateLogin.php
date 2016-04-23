<?php
include "../sql/mysql_connect.php";

$username = $_POST["username"];
$passwort = $_POST["passwort"];



	$sql_login = "SELECT passwort, id FROM benutzer WHERE benutzername = '$username' ";
	$result_login = mysqli_query($connection, $sql_login);
	$c = mysqli_fetch_array($result_login);
	if (!$result_login) {
		echo "Ein Fehler ist aufgetreten.\n";
		exit;
	}
	
	if(empty($username) && empty($passwort)) 
		{
			echo "Benutzername und Passwort sind leer";
		}
		else 
		{
			if(empty($username)) 
				$fehler .= "Benutzername ist leer";
				
			if(empty($passwort)) 
				$fehler .= "Passwort ist leer";
		}
		
		if(empty($fehler))
		{
			$passwort = md5($passwort);
			$pw_db = $c["passwort"];
			
			
			if($passwort == $pw_db) {
				
				
				$_SESSION['userID'] = $c["id"];
				echo $_SESSION['userID'];
				//echo '<meta http-equiv="refresh" content="0; URL=index.php"> ';
				
			}
			else
			{
				echo "Benutzername oder Passwort ist falsch.";
			}
		}


else {
	echo "Error";
}

?>