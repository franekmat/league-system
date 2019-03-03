<html>
  <?php require 'snippets/header.php' ?>
  <body>

  <?php
require 'login.php' ;

if (isset($_POST['send'])!="") {
	$r = oci_parse($conn, "Insert into league(league_name, league_country, league_level)" . "values (:league_name, :league_country, :league_level)");

	oci_bind_by_name($r, ":league_name", $_POST['league_name']);
	oci_bind_by_name($r, ":league_country", $_POST['league_country']);
	oci_bind_by_name($r, ":league_level", $_POST['league_level']);

	$result = oci_execute($r);
	if (!$result) {
		print_r(oci_error($r));
	} else {
		header('Location:league.php');
	}

} else {
	echo "Koniec swiata! Błąd w przesłaniu danych";
	exit;
}

  ?>

  </body>
 </html>
