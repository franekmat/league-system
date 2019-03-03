<html>
  <?php require 'snippets/header.php' ?>
  <body>

  <?php
require 'login.php' ;

if (isset($_POST['send'])!="") {
	$r = oci_parse($conn, "Insert into team(team_name, league_id)" . "values (:team_name, :league_id)");

	oci_bind_by_name($r, ":team_name", $_POST['team_name']);
	oci_bind_by_name($r, ":league_id", $_POST['league_id']);

	$result = oci_execute($r);
	if (!$result) {
		print_r(oci_error($r));
	} else {
		header('Location:team.php');
	}

} else {
	echo "Koniec swiata! Błąd w przesłaniu danych";
	exit;
}

  ?>

  </body>
 </html>
