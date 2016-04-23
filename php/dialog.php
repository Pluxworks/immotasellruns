<?php

echo "<div id=\"dialog-angebotErfolgreich\" title=\"Erfolg!\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Deine Anfrage wurde erfolgreich eingereicht!";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-angebotFehlt\" title=\"Angebot fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde kein Angebot ausgewählt.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-charnameFehlt\" title=\"Characktername/BattleTag fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde kein Charaktername/BattleTag eingegeben.";
echo "</p>";
echo "</div>";


echo "<div id=\"dialog-klasseFehlt\" title=\"Klasse fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde keine Klasse ausgewählt.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-anameFehlt\" title=\"Name fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde kein Angebotsname eingegeben.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-aPreisFehlt\" title=\"Preis fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde kein Preis eingegeben.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-aInfoFehlt\" title=\"Information fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde kein Information eingegeben.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-aRaidFehlt\" title=\"Raid fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde kein Raid ausgewählt.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-angebotAngelegt\" title=\"Erfolg!\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Das neue Angebot wurd erfolgreich angelegt.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-angebotLoeschen\" title=\"L&ouml;schen des Angebotes\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Sind sie sicher, dass sie das ausgew&auml;hlte Angebot l&ouml;schen wollen?";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-angebotloeschenOk\" title=\"Angebot gel&ouml;scht\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Das ausgewählte Angebot wurde erfolgreich gelöscht.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-kaeuferLoeschen\" title=\"L&ouml;schen des K&auml;ufers\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Sind sie sicher, dass sie den ausgew&auml;hlte Käufer l&ouml;schen wollen?";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-kaeuferloeschenOk\" title=\"K&auml;ufer gel&ouml;scht\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Der ausgewählte Käufer wurde erfolgreich gelöscht.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-benutzerLoeschen\" title=\"L&ouml;schen des Benutzers\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Sind sie sicher, dass sie den ausgew&auml;hlte Benutzer l&ouml;schen wollen?";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-benutzerloeschenOk\" title=\"Benutzer gel&ouml;scht\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Der ausgewählte Benutzer wurde erfolgreich gelöscht.";
echo "</p>";
echo "</div>";


echo "<div id=\"dialog-neuesAngebot\" title=\"Neues Angebot\" style=\"display:none;\">";
echo "<p>";
echo "<table id=\"be-\" class=\"tableangebot\">";
	echo "<thead id=\"angebotTH\">";
	echo "<tr id=\"angebotTR\">";
	echo "<th>Name</th>";
	echo "<th>Preis</th>";
	echo "<th>Information</th>";
	echo "<th>Raid</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
		echo "<tr id=\"neu\">";
		echo "<td><input type=\"text\" name=\"name\" id=\"name\" value=\"\"></input></td>";
		echo "<td><input type=\"text\" name=\"preis\" id=\"preis\" value=\"\"></input></td>";
		echo "<td><input type=\"text\" name=\"info\" id=\"info\" value=\"\"></input></td>";
		echo "<td>";
		echo "<select id=\"angebotRaid\" name=\"angebotRaid\">";
		echo "<option/>";
			include "./sql/mysql_connect.php";
			$ausgabe_raid = mysqli_query($connection, "SELECT id, name, kuerzel FROM raid");
			while ($arr = mysqli_fetch_array($ausgabe_raid)) {
					echo "<option value=\"" . $arr["id"] . "\">" . " " . utf8_encode($arr["name"]) . ", ". $arr["kuerzel"] . "</option>\n";
			}
		echo "</td></tr>";
	echo "</tbody></table>";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-angebotBearbeiten\" title=\"Angebot bearbeiten\" style=\"display:none;\">";
echo "<p>";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-updateAngebot\" title=\"Angebot geupdatet\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Das ausgewählte Angebot wurde erfolgreich geupdatet.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-neuerBenutzer\" title=\"Neuer Benutzer\" style=\"display:none;\">";
echo "<p>";
echo "<table id=\"be-\" class=\"tablebenutzer\">";
	echo "<thead id=\"benutzerTH\">";
	echo "<tr id=\"benutzerTR\">";
	echo "<th>Benutzername</th>";
	echo "<th>Passwort</th>";
	echo "<th>Passwort wiederholen</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
		echo "<tr id=\"neu\">";
		echo "<td><input type=\"text\" name=\"benutzername\" id=\"benutzername\" value=\"\"></input></td>";
		echo "<td><input type=\"password\" name=\"passwort1\" id=\"passwort1\" value=\"\"></input></td>";
		echo "<td><input type=\"password\" name=\"passwort2\" id=\"passwort2\" value=\"\"></input></td>";
		echo "</tr>";
	echo "</tbody></table>";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-bnameFehlt\" title=\"Benutzername fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde kein Benutzername eingegeben.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-bpasswort1Fehlt\" title=\"Passwort fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde kein Passwort eingegeben.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-bpasswort2Fehlt\" title=\"Passwort Wiederholung fehlt\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Es wurde keine Passwort wiederholung eingegeben.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-bpasswortStimmennicht\" title=\"Passwörter stimmen nicht überein\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Die eingegeben Passwörter stimmen nicht überein.";
echo "</p>";
echo "</div>";

echo "<div id=\"dialog-benutzerAngelegt\" title=\"Erfolg!\" style=\"display:none;\">";
echo "<p>";
echo "<span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin:0 7px 20px 0;\"></span>";
echo "Der neue Benutzer wurd erfolgreich angelegt.";
echo "</p>";
echo "</div>";
?>


