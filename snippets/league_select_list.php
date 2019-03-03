<select name='league_id'>
<?php
$r = oci_parse($conn, "SELECT * FROM league order by league_name");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach($all as $i => $row)
	{
	$selected = $league["LEAGUE_ID"] == $row["LEAGUE_ID"] ? " selected " : "" ;
	echo "<option value='" . $row["LEAGUE_ID"] . "'".  $selected . ">" . $row["LEAGUE_NAME"] . "</option>";
	}

?>
</select>
