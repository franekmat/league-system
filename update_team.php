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

	if(isset($_GET['team_id'])) {
		$r = oci_parse($conn, "SELECT * FROM team WHERE team_id = :team_id");
		oci_bind_by_name($r, ":team_id", $_GET['team_id']);
		oci_execute($r);
		$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
		$emp = $all[0];
	} else if(isset($_POST['send'])) {

		$r = oci_parse($conn, "UPDATE team set team_name = :team_name, league_id = :league_id
                       WHERE team_id = :team_id");
		oci_bind_by_name($r, ":team_id", $_POST['team_id']);
		oci_bind_by_name($r, ":team_name", $_POST['team_name']);
		oci_bind_by_name($r, ":league_id", $_POST['league_id']);

		$result = oci_execute($r);

		if (!$result) {
			print_r(oci_error($r));
		} else {
			header('Location:update_team.php?team_id='.$_POST['team_id']);
		}

    } else {
		echo "Koniec swiata! Błąd w przesłaniu danych";
	}


?>
<br><br><center>
	<form action='update_team.php' method='post' style="background-color:#efefef">
        <fieldset>
            <legend><b>Team</b></legend>
        <br>Team id: <input type='number' name='team_id' value='<?php echo $emp["TEAM_ID"] ?>' /><br />
		<br>Team name: <input type='text' name='team_name' value='<?php echo $emp["TEAM_NAME"] ?>' /><br />
		<br>League: <?php require 'snippets/league_select_list.php' ?><br />
        <br><br>
		<input type='Submit' name="send" value="Submit">
    </fieldset>
	</form>
    <br>
    <br>
    <a href = "team.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
