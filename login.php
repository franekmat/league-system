<?php
$conn = oci_connect("mf385442", "cotidiemorimur", null, 'AL32UTF8');

if (!$conn)	{
	$e = oci_error();
	echo "({$e['message']})";
	exit;
}
?>
