

<?php
include "../sql/mysql_connect.php";
$id = $_POST["id"];

$sql_loot = "SELECT i.blizz_id, i.name, i.quality, ib.difficulty, ib.warforged, ib.sockel, ib.lifeleach, ib.speed, ib.undestroyable, ib.dodge FROM item i LEFT JOIN item_bonus ib ON i.item_bonus_id = ib.id  WHERE i.boss_id = '$id'";
$result_loot = mysqli_query($connection, $sql_loot);


while($c = mysqli_fetch_array($result_loot)) {
	echo "<div id=\"itembox\"><a onclick=\"return false;\" class=\"" . $c["quality"] . "\"  href=\"//de.wowhead.com/item=" . $c["blizz_id"] . "/\" rel=\"bonus=" . $c["difficulty"] . "\">[" . utf8_encode($c["name"]) . "]</a></div><br>";

}

?>

