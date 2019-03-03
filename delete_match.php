<?php
  require 'login.php';

  if(isset($_GET['match_id']) != "") {

	$r = oci_parse($conn, "delete from match where match_id = :match_id");
	oci_bind_by_name($r, ":match_id", $_GET['match_id']);
	$deleted = oci_execute($r);

	if($deleted) {
      header("Location:match.php");
	} else {
      echo "Coś poszło nie tak z usuwaniem rekordu";
	}
  } else {
	  echo "Koniec swiata! Błąd w przesłaniu danych";
  }

?>
