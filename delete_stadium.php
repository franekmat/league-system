<?php
  require 'login.php';

  if(isset($_GET['stadium_id']) != "") {

	$r = oci_parse($conn, "delete from stadium where stadium_id = :stadium_id");
	oci_bind_by_name($r, ":stadium_id", $_GET['stadium_id']);
	$deleted = oci_execute($r);

	if($deleted) {
      header("Location:stadium.php");
	} else {
      echo "Coś poszło nie tak z usuwaniem rekordu";
	}
  } else {
	  echo "Koniec swiata! Błąd w przesłaniu danych";
  }

?>
