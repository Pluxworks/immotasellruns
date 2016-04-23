<div id="logindirect">
	Zum Login <br> <br> 
	<a href="?action=login"><button id="tologin">Login</button></a><br><br>
	Zum Formular<br><br>
	<a href="?action=form"><button id="tologin">Formular</button></a>
</div>
<div id="pic"><img id="titlePic" src="css/images/Immotatransparent.png"></img><br>Sell Runs</div>
<div id="newsbox">
	<div id="newstitle">News</div>
	<?php

	$sql_news = "SELECT id, titel, newstext, datum FROM news";
	$result_news = mysqli_query($connection, $sql_news);


	
	while($c = mysqli_fetch_array($result_news)) {
	echo "<div class=\"textbox\">";
	echo "<div class=\"texthead\">";
	echo "<div class=\"textid\">#" . $c["id"] . "</div>";
	echo "<div class=\"texttitle\">" . utf8_encode($c["titel"]) . "</div>";
	echo "<div class=\"textdate\">" . $c["datum"] . "</div>";
	echo "</div>";
	echo "<div class=\"textbody\">" . utf8_encode($c["newstext"]) . "</div>";
	echo "</div>";
	}
	
	
	?>

</div>