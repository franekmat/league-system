<html>
  <?php require 'snippets/header.php' ?>
  <body>

  <?php
require 'login.php' ;

if (isset($_POST['send'])!="") {
	$r = oci_parse($conn, "Insert into player(player_name, player_surname, player_position, team_id)" . "values (:player_name, :player_surname, :player_position, :team_id)");

	oci_bind_by_name($r, ":player_name", $_POST['player_name']);
    oci_bind_by_name($r, ":player_surname", $_POST['player_surname']);
    oci_bind_by_name($r, ":player_position", $_POST['player_position']);
	oci_bind_by_name($r, ":team_id", $_POST['team_id']);

	$result = oci_execute($r);
	if (!$result) {
		print_r(oci_error($r));
	} else {
		header('Location:player.php');
	}

} else {
	echo "Koniec swiata! Błąd w przesłaniu danych";
	exit;
}

  ?>

  </body>
 </html>
