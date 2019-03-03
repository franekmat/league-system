<?php
  require 'login.php';

  if(isset($_GET['player_id']) != "") {

	$r = oci_parse($conn, "delete from player where player_id = :player_id");
	oci_bind_by_name($r, ":player_id", $_GET['player_id']);
	$deleted = oci_execute($r);

	if($deleted) {
      header("Location:player.php");
	} else {
      echo "Coś poszło nie tak z usuwaniem rekordu";
	}
  } else {
	  echo "Koniec swiata! Błąd w przesłaniu danych";
  }

?>
