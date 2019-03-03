<select name='league_country'>
<?php
$r = oci_parse($conn, "SELECT * FROM league group by league_country");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach($all as $i => $row)
{
	$selected = $league["LEAGUE_COUNTRY"] == $row["LEAGUE_COUNTRY"] ? " selected " : "" ;
	echo "<option value='" . $row["LEAGUE_COUNTRY"] . "'".  $selected . ">" . $row["LEAGUE_COUNTRY"] . "</option>";
}

?>
</select>
