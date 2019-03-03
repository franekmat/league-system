<html>
  <?php require 'snippets/header.php' ?>
  <body>

  <?php
require 'login.php' ;

if (isset($_POST['send'])!="") {
	$r = oci_parse($conn, "Insert into contract(player_id, team_id, contract_start_date, contract_expiration_date)" . "values (:player_id, :team_id, :contract_start_date, :contract_expiration_date)");

	oci_bind_by_name($r, ":player_id", $_POST['player_id']);
	oci_bind_by_name($r, ":team_id", $_POST['team_id']);
    oci_bind_by_name($r, ":contract_start_date", strtoupper(date('d-M-y', strtotime($_POST['contract_start_date']))));
	oci_bind_by_name($r, ":contract_expiration_date", strtoupper(date('d-M-y', strtotime($_POST['contract_expiration_date']))));

	$result = oci_execute($r);
	if (!$result) {
		print_r(oci_error($r));
	} else {
		header('Location:contract.php');
	}

} else {
	echo "Koniec swiata! Błąd w przesłaniu danych";
	exit;
}

  ?>

  </body>
 </html>
