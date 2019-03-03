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

	if(isset($_GET['stadium_id'])) {
		$r = oci_parse($conn, "SELECT * FROM stadium WHERE stadium_id = :stadium_id");
		oci_bind_by_name($r, ":stadium_id", $_GET['stadium_id']);
		oci_execute($r);
		$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
		$emp = $all[0];
	} else if(isset($_POST['send'])) {

		$r = oci_parse($conn, "UPDATE stadium set stadium_name = :stadium_name,
                       stadium_capacity = :stadium_capacity, stadium_attendance_record = :stadium_attendance_record
                       WHERE stadium_id = :stadium_id");
		oci_bind_by_name($r, ":stadium_id", $_POST['stadium_id']);
		oci_bind_by_name($r, ":stadium_name", $_POST['stadium_name']);
		oci_bind_by_name($r, ":stadium_capacity", $_POST['stadium_capacity']);
		oci_bind_by_name($r, ":stadium_attendance_record", $_POST['stadium_attendance_record']);

		$result = oci_execute($r);

		if (!$result) {
			print_r(oci_error($r));
		} else {
			header('Location:update_stadium.php?stadium_id='.$_POST['stadium_id']);
		}

    } else {
		echo "Koniec swiata! Błąd w przesłaniu danych";
	}


?>
<br><br><center>
	<form action='update_stadium.php' method='post' style="background-color:#efefef">
        <fieldset>
            <legend><b>Stadium</b></legend>
        <br>Stadium id: <input type='number' name='stadium_id' value='<?php echo $emp["STADIUM_ID"] ?>' /><br />
        <br>Name: <input type='text' name='stadium_name' value='<?php echo $emp["STADIUM_NAME"] ?>'/><br />
        <br>Capacity: <input type='number' name='stadium_capacity' value='<?php echo $emp["STADIUM_CAPACITY"] ?>' /><br />
        <br>Attendance record: <input type='number' name='stadium_attendance_record' value='<?php echo $emp["STADIUM_ATTENDANCE_RECORD"] ?>'/><br />
		<br><br>
        <input type='Submit' name="send" value="Submit">
    </fieldset>
	</form>
    <br>
    <br>
    <a href = "stadium.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
