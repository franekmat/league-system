<html>
  <?php require 'snippets/header.php' ?>
  <body>

  <?php
require 'login.php' ;

if (isset($_POST['send'])!="") {
	$r = oci_parse($conn, "Insert into stadium(stadium_name, stadium_capacity, stadium_attendance_record)" . "values (:stadium_name, :stadium_capacity, :stadium_attendance_record)");

	oci_bind_by_name($r, ":stadium_name", $_POST['stadium_name']);
	oci_bind_by_name($r, ":stadium_capacity", $_POST['stadium_capacity']);
    oci_bind_by_name($r, ":stadium_attendance_record", $_POST['stadium_attendance_record']);

	$result = oci_execute($r);
	if (!$result) {
		print_r(oci_error($r));
	} else {
		header('Location:stadium.php');
	}

} else {
	echo "Koniec swiata! Błąd w przesłaniu danych";
	exit;
}

  ?>

  </body>
 </html>
