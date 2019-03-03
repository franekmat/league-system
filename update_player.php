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

	if(isset($_GET['player_id'])) {
		$r = oci_parse($conn, "SELECT * FROM player WHERE player_id = :player_id");
		oci_bind_by_name($r, ":player_id", $_GET['player_id']);
		oci_execute($r);
		$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
		$emp = $all[0];
	} else if(isset($_POST['send'])) {

		$r = oci_parse($conn, "UPDATE player set player_name = :player_name, player_surname = :player_surname,
                       player_position = :player_position, team_id = :team_id WHERE player_id = :player_id");
		oci_bind_by_name($r, ":player_id", $_POST['player_id']);
		oci_bind_by_name($r, ":player_name", $_POST['player_name']);
		oci_bind_by_name($r, ":player_surname", $_POST['player_surname']);
		oci_bind_by_name($r, ":player_position", $_POST['player_position']);
		oci_bind_by_name($r, ":team_id", $_POST['team_id']);

		$result = oci_execute($r);

		if (!$result) {
			print_r(oci_error($r));
		} else {
			header('Location:update_player.php?player_id='.$_POST['player_id']);
		}

    } else {
		echo "Koniec swiata! Błąd w przesłaniu danych";
	}


?>
<br><br><center>
	<form action='update_player.php' method='post' style="background-color:#efefef">
        <fieldset>
            <legend><b>Player</b></legend>
        <br>Player id: <input type='number' name='player_id' value='<?php echo $emp["PLAYER_ID"] ?>' /><br />
		<br>Name: <input type='text' name='player_name' value='<?php echo $emp["PLAYER_NAME"] ?>' /><br />
		<br>Surname: <input type='text' name='player_surname' value='<?php echo $emp["PLAYER_SURNAME"] ?>' /><br />
		<br>Position: <input type='text' name='player_position' value='<?php echo $emp["PLAYER_POSITION"] ?>' /><br />
		<br>Team: <?php require 'snippets/team_select_list.php' ?><br />
        <br><br>
		<input type='Submit' name="send" value="Submit">
    </fieldset>
	</form>
    <br>
    <br>
    <a href = "player.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
