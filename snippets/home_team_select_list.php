<select name='match_home_team_id'>
<?php
$r = oci_parse($conn, "SELECT * FROM team order by team_name");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach($all as $i => $row)
{
	$selected = $team["TEAM_ID"] == $row["TEAM_ID"] ? " selected " : "" ;
	echo "<option value='" . $row["TEAM_ID"] . "'".  $selected . ">" . $row["TEAM_NAME"] . "</option>";
}

?>
</select>
