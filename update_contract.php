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

	if(isset($_GET['contract_id'])) {
		$r = oci_parse($conn, "SELECT * FROM contract WHERE contract_id = :contract_id");
		oci_bind_by_name($r, ":contract_id", $_GET['contract_id']);
		oci_execute($r);
		$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
		$emp = $all[0];
	} else if(isset($_POST['send'])) {

		$r = oci_parse($conn, "UPDATE contract set player_id = :player_id, team_id = :team_id,
                      contract_start_date = :contract_start_date, contract_expiration_date = :contract_expiration_date
                      WHERE contract_id = :contract_id");
		oci_bind_by_name($r, ":contract_id", $_POST['contract_id']);
		oci_bind_by_name($r, ":player_id", $_POST['player_id']);
		oci_bind_by_name($r, ":team_id", $_POST['team_id']);
		oci_bind_by_name($r, ":contract_start_date", strtoupper(date('d-M-y', strtotime($_POST['contract_start_date']))));
		oci_bind_by_name($r, ":contract_expiration_date", strtoupper(date('d-M-y', strtotime($_POST['contract_expiration_date']))));

		$result = oci_execute($r);

		if (!$result) {
			print_r(oci_error($r));
		} else {
			header('Location:update_contract.php?contract_id='.$_POST['contract_id']);
		}

    } else {
		echo "Koniec swiata! Błąd w przesłaniu danych";
	}


?>
<br><br><center>
	<form action='update_contract.php' method='post' style="background-color:#efefef">
        <fieldset>
            <legend><b>Contract</b></legend>
        <br>Contract id: <input type='number' name='contract_id' value='<?php echo $emp["CONTRACT_ID"] ?>' /><br />
        <br>Player: <?php require 'snippets/player_select_list.php' ?><br />
        <br>Team: <?php require 'snippets/team_select_list.php' ?><br />
        <br>Start date: <input type='date' name='contract_start_date' value='<?php echo $emp["CONTRACT_START_DATE"] ?>'/><br />
        <br>Expiration date: <input type='date' name='contract_expiration_date' value='<?php echo $emp["CONTRACT_EXPIRATION_DATE"] ?>'/><br />
        <br><br>
        <input type='Submit' name="send" value="Submit">
    </fieldset>
	</form>
    <br>
    <br>
    <a href = "contract.php"><img src = "bt_return.gif"></a>
</center>

  </body>
</html>
