<div id="mainLogin">
	<p><img id="titlePic2" src="css/images/Immotatransparent.png"></img></p>
	<div id="loginbox">
		<p id="nametitle">IF Sell Runs</p>
		<p>Admin Login</p><br>
		
		<form action="" method="POST">
			<span class="login">Benutzername</span><br>
			<input id="username" name="username">
			<br><br>
			<span class="login">Kennwort</span><br>
			<input id="password" type="password" name="password"><br><br>
			<button name="anmelden" id="login">Anmelden</button>
		</form>
			
			
	</div>

</div>

<?php
if(isset($_POST['anmelden'])) {
	include "./sql/mysql_connect.php";

	$username = $_POST["username"];
	$passwort = $_POST["password"];
	

	

	$sql_login = "SELECT passwort, id FROM benutzer WHERE benutzername = '$username' ";
	$result_login = mysqli_query($connection, $sql_login);
	$c = mysqli_fetch_array($result_login);
	$fehler = "";
	
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
				echo '<meta http-equiv="refresh" content="0; URL=index.php"> ';
				$_SESSION['userID'] = $c["id"];
				
			}
			else
			{
				echo "Benutzername oder Passwort ist falsch.";
			}
		}
		
		

}
?>