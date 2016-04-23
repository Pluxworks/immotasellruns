<div id="mainliste">
	<div id="menu">
		<div id="byebox">
			<button id="logout" name="logout">Logout</button>
		</div>
		<div id="angeboteditbox">
			<button id="angebotedit" name="angebotedit">Angebote editieren</button>
		</div>
		<div id="backtolistbox">
			<button id="backtolist" name="backtolist">Käufer Liste</button>
		</div>
		<div id="usermanagebox">
			<button id="usermanage" name="usermanage">Benutzer verwalten</button>
		</div>
	</div>
	
	<div id="tablelist">
	<table id="kaeuferlist">
	<?php
			
			$sql_list = "SELECT ka.id, ka.charname, kl.name as klassenname, kl.color, kl.symbol, ka.angebot_name, ka.angebot_preis, ka.angebot_info  
			FROM kaeufer ka LEFT JOIN klassen kl ON ka.klassen_id = kl.id";
			$result_list = mysqli_query($connection, $sql_list);
			echo "<tr>";
			echo "<td class=\"tdhead\"></td>";
			echo "<td class=\"tdhead\">Charaktername/BattleTag</td>";
			echo "<td class=\"tdhead\">Klasse</td>";
			echo "<td class=\"tdhead\">gewähltes Angebot</td>";
			echo "<td class=\"tdhead\">Preis</td>";
			echo "<td class=\"tdhead\">Informationen</td>";
			echo "<td class=\"tdhead\"></td>";
			echo "</tr>";
			while($c = mysqli_fetch_array($result_list)) {
			echo "<tr id=\"" . $c["id"] . "\">";
			echo "<td id=\"a" . $c["id"] . "\" class=\"tdlist\"><img class=\"tableclassicon\" src=\"" . $c["symbol"] . "\"></img></td>";
			echo "<td id=\"b" . $c["id"] . "\" class=\"tdlist\" style=\"color:" . $c["color"] . "\">" . utf8_encode($c["charname"]) . "</td>";
			echo "<td id=\"c" . $c["id"] . "\" class=\"tdlist\" style=\"color:" . $c["color"] . "\">" . utf8_encode($c["klassenname"]) . "</td>";
			echo "<td id=\"d" . $c["id"] . "\" class=\"tdlist\">" . utf8_encode($c["angebot_name"]) . "</td>";
			echo "<td id=\"e" . $c["id"] . "\" class=\"tdlist\">" . $c["angebot_preis"] . "</td>";
			echo "<td id=\"f" . $c["id"] . "\" class=\"tdlist\">" . utf8_encode($c["angebot_info"]) . "</td>";
			echo "<td id=\"g" . $c["id"] . "\" class=\"tdlist\"><img id=\"g" . $c["id"] . "\" class=\"tableclassicon\" src=\"css/images/delete.ico\"></img></td>";
			echo "</tr>";
			}
			
			
	?>
	</table>
	</div>
</div>