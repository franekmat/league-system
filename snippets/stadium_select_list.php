<select name='stadium_id'>
<?php
$r = oci_parse($conn, "SELECT * FROM stadium order by stadium_name");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach($all as $i => $row)
{
	$selected = $team["STADIUM_ID"] == $row["STADIUM_ID"] ? " selected " : "" ;
	echo "<option value='" . $row["STADIUM_ID"] . "'".  $selected . ">" . $row["STADIUM_NAME"] . "</option>";
}

?>
</select>
