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
<a href='add_team.php'><img src = "bt_add_team.gif"></a>
<br><br>
<table border="1">
	<tr>
        <!-- <th>team id</th> -->
        <th>team name</th>
		<!-- <th>league id</th> -->
        <th>league name</th>
        <th>edit</th>
        <th>delete</th>
	</tr>

<?php

$r = oci_parse($conn, "SELECT team.team_id, team.team_name, team.league_id,
               league.league_name FROM team, league WHERE team.league_id =
               league.league_id ORDER BY league.league_id");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach ($all as $i => $row) {
	echo "<tr>";
	// echo "<td>".$row["TEAM_ID"]."</td>";
	echo "<td>".$row["TEAM_NAME"]."</td>";
	// echo "<td>".$row["LEAGUE_ID"]."</td>";
	echo "<td>".$row["LEAGUE_NAME"]."</td>";
    echo "<td>"."<a href=\"update_team.php?team_id=".$row["TEAM_ID"]."\">edit</a>"."</td>";
    echo "<td>"."<a href=\"delete_team.php?team_id=".$row["TEAM_ID"]."\">delete</a>"."</td>";
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
