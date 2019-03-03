<html>
<head>
    <style>
    html {
        background-image: url(bg.jpg);
        background-repeat: repeat;
    }
    </style>
</head>
  <body>

<?php
	require 'login.php';

	if(isset($_GET['match_id'])) {
		$r = oci_parse($conn, "SELECT * FROM match WHERE match_id = :match_id");
		oci_bind_by_name($r, ":match_id", $_GET['match_id']);
		oci_execute($r);
		$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
		$emp = $all[0];
	} else if(isset($_POST['send'])) {

		$r = oci_parse($conn, "UPDATE match set match_round = :match_round, match_home_team_id = :match_home_team_id,
                      match_away_team_id = :match_away_team_id, match_home_team_goals = :match_home_team_goals,
                      match_away_team_goals = :match_away_team_goals, stadium_id = :stadium_id
                      WHERE match_id = :match_id");
		oci_bind_by_name($r, ":match_id", $_POST['match_id']);
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
			header('Location:update_match.php?match_id='.$_POST['match_id']);
		}

    } else {
		echo "Koniec swiata! Błąd w przesłaniu danych";
	}


?>
<br><br><center>
	<form action='update_match.php' method='post' style="background-color:#efefef">
        <fieldset>
            <legend><b>Match</b></legend>
        <br>Match id: <input type='number' name='match_id' value='<?php echo $emp["MATCH_ID"] ?>' /><br />
        <br>Round: <input type='number' name='match_round' value='<?php echo $emp["MATCH_ROUND"] ?>'/><br />
        <br>Home team: <?php require 'snippets/home_team_select_list.php' ?><br />
        <br>Away team: <?php require 'snippets/away_team_select_list.php' ?><br />
        <br>Home team goals: <input type='number' name='match_home_team_goals' value='<?php echo $emp["MATCH_HOME_TEAM_GOALS"] ?>'/><br />
        <br>Away team goals: <input type='number' name='match_away_team_goals' value='<?php echo $emp["MATCH_AWAY_TEAM_GOALS"] ?>'/><br />
    	<br>Stadium: <?php require 'snippets/stadium_select_list.php' ?><br />
        <br><br>
		<input type='Submit' name="send" value="Submit">
    </fieldset>
	</form>
    <br>
    <br>
    <a href = "match.php"><img src = "bt_return.gif"></a>
</center
  </body>
</html>
