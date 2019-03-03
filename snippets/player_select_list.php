<select name='player_id'>
<?php
$r = oci_parse($conn, "SELECT * FROM player order by player_name");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach($all as $i => $row)
{
	$selected = $team["PLAYER_ID"] == $row["PLAYER_ID"] ? " selected " : "" ;
	echo "<option value='" . $row["PLAYER_ID"] . "'".  $selected . ">" . $row["PLAYER_NAME"] . " " . $row["PLAYER_SURNAME"] . "</option>";
}

?>
</select>
