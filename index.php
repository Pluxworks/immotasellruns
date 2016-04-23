<?php
include("php/session.php");
include("sql/mysql_connect.php");
$userID = $_SESSION['userID'];
$sql = mysqli_query($connection, "SELECT * FROM benutzer WHERE id = '$userID'");
$userData = mysqli_fetch_array($sql);
$user = $userData["benutzername"]; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>Immota Fides Sell Runs</title>
	<link rel="Shortcut Icon" href="css/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
	
	<script src="js/jquery-2.2.2.js" type="text/javascript"></script>
	<script src="js/jquery-2.2.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui.js" type="text/javascript"></script>
	<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>

<?php
    $action = $_GET["action"];

    if(!($_SESSION["userID"] == true) ){
			if($action == "login")
				include("php/login.php");
			elseif($action == "news")
				include("php/news.php");
			elseif($action == "back")
				include("php/login.php");
			else {
				include("php/main.php");
				//include("php/login.php");
			}
    } else {
		include("php/liste.php");
	}
?>
<div id="dialog" style="display:none">
    <?php include("php/dialog.php"); ?>
</div>

</body>
</html>