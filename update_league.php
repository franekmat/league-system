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

	if(isset($_GET['league_id'])) {
		$r = oci_parse($conn, "SELECT * FROM league WHERE league_id = :league_id");
		oci_bind_by_name($r, ":league_id", $_GET['league_id']);
		oci_execute($r);
		$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
		$emp = $all[0];
	} else if(isset($_POST['send'])) {

		$r = oci_parse($conn, "UPDATE league set league_name = :league_name, league_country = :league_country,
                       league_level = :league_level WHERE league_id = :league_id");
		oci_bind_by_name($r, ":league_id", $_POST['league_id']);
		oci_bind_by_name($r, ":league_name", $_POST['league_name']);
		oci_bind_by_name($r, ":league_country", $_POST['league_country']);
		oci_bind_by_name($r, ":league_level", $_POST['league_level']);

		$result = oci_execute($r);

		if (!$result) {
			print_r(oci_error($r));
		} else {
			header('Location:update_league.php?league_id='.$_POST['league_id']);
		}

    } else {
		echo "Koniec swiata! Błąd w przesłaniu danych";
	}


?>
<br><br><center>
	<form action='update_league.php' method='post' style="background-color:#efefef">
        <fieldset>
            <legend><b>League</b></legend>
        <br>League id: <input type='number' name='league_id' value='<?php echo $emp["LEAGUE_ID"] ?>' /><br />
		<br>League name: <input type='text' name='league_name' value='<?php echo $emp["LEAGUE_NAME"] ?>' /><br />
		<br>Country: <input type='text' name='league_country' value='<?php echo $emp["LEAGUE_COUNTRY"] ?>' /><br />
		<br>Level: <input type='number' name='league_level' value='<?php echo $emp["LEAGUE_LEVEL"] ?>' /><br />
		<br><br>
        <input type='Submit' name="send" value="Submit">
    </fieldset>
	</form>
    <br>
    <br>
    <a href = "league.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
