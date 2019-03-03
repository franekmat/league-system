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
<br><br>
<a href='add_player.php'><img src = "bt_add_player.gif"></a>
<br><br>
<table border="1">
	<tr>
        <!-- <th>id</th> -->
        <th>name</th>
		<th>surname</th>
        <th>position</th>
        <th>team</th>
        <th>edit</th>
        <th>delete</th>
	</tr>

<?php

$r = oci_parse($conn, "SELECT player.player_id, player.player_name, player.player_surname,
               player.player_position, team.team_name FROM player, team WHERE team.team_id =
               player.team_id ORDER BY team.team_id");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach ($all as $i => $row) {
	echo "<tr>";
	// echo "<td>".$row["PLAYER_ID"]."</td>";
	echo "<td>".$row["PLAYER_NAME"]."</td>";
	echo "<td>".$row["PLAYER_SURNAME"]."</td>";
	echo "<td>".$row["PLAYER_POSITION"]."</td>";
	echo "<td>".$row["TEAM_NAME"]."</td>";
    echo "<td>"."<a href=\"update_player.php?player_id=".$row["PLAYER_ID"]."\">edit</a>"."</td>";
    echo "<td>"."<a href=\"delete_player.php?player_id=".$row["PLAYER_ID"]."\">delete</a>"."</td>";
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
