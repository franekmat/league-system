<html>
  <?php require 'snippets/header.php' ?>
  <body>

  <?php
require 'login.php' ;

if (isset($_POST['send'])!="") {
	$r = oci_parse($conn, "Insert into match(match_round, match_home_team_id, match_away_team_id, match_home_team_goals, match_away_team_goals, stadium_id)" . "values (:match_round, :match_home_team_id, :match_away_team_id, :match_home_team_goals, :match_away_team_goals, :stadium_id)");

	oci_bind_by_name($r, ":match_round", $_POST['match_round']);
    oci_bind_by_name($r, ":match_home_team_id", $_POST['match_home_team_id']);
    oci_bind_by_name($r, ":match_away_team_id", $_POST['match_away_team_id']);
    oci_bind_by_name($r, ":match_home_team_goals", $_POST['match_home_team_goals']);
    oci_bind_by_name($r, ":match_away_team_goals", $_POST['match_away_team_goals']);
	oci_bind_by_name($r, ":stadium_id", $_POST['stadium_id']);

	$result = oci_execute($r);
	if (!$result) {
		print_r(oci_error($r));
	} else {
		header('Location:match.php');
	}

} else {
	echo "Koniec swiata! Błąd w przesłaniu danych";
	exit;
}

  ?>

  </body>
 </html>
