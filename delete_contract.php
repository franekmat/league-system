<?php
  require 'login.php';

  if(isset($_GET['contract_id']) != "") {

	$r = oci_parse($conn, "delete from contract where contract_id = :contract_id");
	oci_bind_by_name($r, ":contract_id", $_GET['contract_id']);
	$deleted = oci_execute($r);

	if($deleted) {
      header("Location:contract.php");
	} else {
      echo "Coś poszło nie tak z usuwaniem rekordu";
	}
  } else {
	  echo "Koniec swiata! Błąd w przesłaniu danych";
  }

?>
