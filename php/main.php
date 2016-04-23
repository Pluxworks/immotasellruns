<?php
$userID = $_SESSION['userID'];
if($userID != ""){
echo "<div id=\"logoutbox\">";
	echo	"<button id=\"logout\" name=\"logout\">Abmelden</button>";
	echo "</div>";
}
?>	
<div id="logobox"><img id="immotalogo" src="css/images/Immotatransparent.png"></img></div>

<div id="logindirect">
	Zum Login <br> <br> 
	<a href="?action=login"><button id="tologin">Login</button></a><br><br>
	Zu den News <br><br> 
	<a href="?action=news"><button>News</button></a><br><br>
	Immota Fides Homepage<br><br>
	<a href="https://immota-fides.eu/"><button>Homepage</button></a>
</div>

<div id="mainframe">
	<div id="sellform">
		
		<p id="title">Sell Runs auf Forscherliga EU / Allianz</p>
		Wähle zunächst den gewünschten Raid aus:
		<fieldset id="raidfield">
			<?php

			$sql_raid = "SELECT id, name, kuerzel, pic FROM raid";
			$result_raid = mysqli_query($connection, $sql_raid);


			
			while($c = mysqli_fetch_array($result_raid)) {
			echo "<div class=\"raidbox\">";
			echo "<label for=\"" . $c["id"] . "\"><img class=\"raidpic\" src=\"" . $c["pic"] . "\"></img></label><br>";
			echo "<input name=\"raidauswahl\" class=\"raidcheck\" id=\"" . $c["id"] . "\" type=\"radio\" value=\"" . $c["id"] . "\"></input><p class=\"raidname\">" . utf8_encode($c["name"]) . ", " . $c["kuerzel"] . "</p>";
			echo "</div>";
			}
			
			
			?>
		</fieldset>
		
		<fieldset id="offers" name="offers">
		
		</fieldset>
		
		<div id="namebox">
			Informationen zu dir:<br>
			BattleTag:<br>
			<input type="text" id="charname" name="charname" title="Wir benötigen den BattleTag nur um dich ingame kontaktieren zu können."></input><br>
			Klasse:<br>
			<select id="class" name="class">
					<?php
					$raiddata = "SELECT id, name FROM klassen";
					$raiddata = mysqli_query($connection, $raiddata);
					while ($arr = mysqli_fetch_array($raiddata)) {
					echo "<option value=\"". $arr["id"] . "\">" . utf8_encode($arr['name']) . "</option>";
					}
					?>
			</select>
		</div>
		<br><button id="abschicken" name="abschicken">abschicken</button>
		
	</div>
<div id="infobox">
	<p id="ruletitle">Allgemeine Regeln</p>
	<p class="rulesubtitle">Die Sellruns beinhalten:</p><br>
	- Allen Loot eurer Rüstungsklasse (WF, Sockel in Ausnahmefällen locked, sofern es noch ein     Gildenmember benötigt)<br>
	- Keine Tokens<br><br>
	<p class="rulesubtitle">Regeln:</p><br>
	- Vorkasse von 20% (Dieses Gold wird vom Kaufpreis abgezogen.) Bei Nichterscheinen, ohne mindestens 48h vorher Bescheid zu sagen,  wird das Gold einbehalten.
	<br><br>- Das Gold ist im Voraus zu zahlen.<br>
	<br>- Wir sind für die jeweiligen Dropraten nicht verantwortlich.
	<br><br>
	Wir werden uns für weitere Informationen mit euch in Verbindung setzen.
	<br><br>
	Viel Spaß wünscht euch Immota Fides
</div>

</div>


