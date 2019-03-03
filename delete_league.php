<?php
  require 'login.php';

  if(isset($_GET['league_id']) != "") {

	$r = oci_parse($conn, "delete from league where league_id = :league_id");
	oci_bind_by_name($r, ":league_id", $_GET['league_id']);
	$deleted = oci_execute($r);

	if($deleted) {
      header("Location:league.php");
	} else {
      echo "Coś poszło nie tak z usuwaniem rekordu";
	}
  } else {
	  echo "Koniec swiata! Błąd w przesłaniu danych";
  }

?>
