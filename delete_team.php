<?php
  require 'login.php';

  if(isset($_GET['team_id']) != "") {

	$r = oci_parse($conn, "delete from team where team_id = :team_id");
	oci_bind_by_name($r, ":team_id", $_GET['team_id']);
	$deleted = oci_execute($r);

	if($deleted) {
      header("Location:team.php");
	} else {
      echo "Coś poszło nie tak z usuwaniem rekordu";
	}
  } else {
	  echo "Koniec swiata! Błąd w przesłaniu danych";
  }

?>
