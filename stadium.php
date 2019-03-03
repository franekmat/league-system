<html>
<head>
    <style>
    html {
        background-image: url(bg.jpg);
        background-repeat: repeat;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    tr:nth-child(odd) {
        background-color: #efefef;
    }
  </style>
</head>
  <body>
      <center>

<?php require 'login.php' ?>
<br>
<br>
<a href='add_stadium.php'><img src = "bt_add_stadium.gif"></a>
<br>
<br>
<table border="1">
	<tr>
        <th>name</th>
		<th>capacity</th>
        <th>attendance record</th>
        <th>edit</th>
        <th>delete</th>
	</tr>

<?php

$r = oci_parse($conn, "SELECT stadium.stadium_id, stadium.stadium_name, stadium.stadium_capacity,
               stadium.stadium_attendance_record FROM stadium ORDER BY stadium.stadium_name");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach ($all as $i => $row) {
	echo "<tr>";
	echo "<td>".$row["STADIUM_NAME"]."</td>";
	echo "<td>".$row["STADIUM_CAPACITY"]."</td>";
	echo "<td>".$row["STADIUM_ATTENDANCE_RECORD"]."</td>";
    echo "<td>"."<a href=\"update_stadium.php?stadium_id=".$row["STADIUM_ID"]."\">edit</a>"."</td>";
    echo "<td>"."<a href=\"delete_stadium.php?stadium_id=".$row["STADIUM_ID"]."\">delete</a>"."</td>";
	echo "</tr>";
}

?>

	</table>
    <br>
    <br>
    <a href = "index.html"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
