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
<a href='add_match.php'><img src = "bt_add_match.gif"></a>
<br><br>
<table border="1">
	<tr>
        <th>round</th>
        <th>home team</th>
        <th>away team</th>
        <th>home team goals</th>
        <th>away team goals</th>
        <th>stadium</th>
        <th>edit</th>
        <th>delete</th>
	</tr>

<?php

$r = oci_parse($conn, "SELECT match.match_id, match.match_round, team1.team_name as TEAM1,
               team2.team_name as TEAM2, match.match_home_team_goals,
               match.match_away_team_goals, stadium.stadium_name
               FROM match
               JOIN stadium ON stadium.stadium_id = match.stadium_id
               JOIN team team1 ON team1.team_id = match.match_home_team_id
               JOIN team team2 ON team2.team_id = match.match_away_team_id
               ORDER BY match.match_round");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach ($all as $i => $row) {
	echo "<tr>";
	echo "<td>".$row["MATCH_ROUND"]."</td>";
	echo "<td>".$row["TEAM1"]."</td>";
	echo "<td>".$row["TEAM2"]."</td>";
	echo "<td>".$row["MATCH_HOME_TEAM_GOALS"]."</td>";
    echo "<td>".$row["MATCH_AWAY_TEAM_GOALS"]."</td>";
    echo "<td>".$row["STADIUM_NAME"]."</td>";
    echo "<td>"."<a href=\"update_match.php?match_id=".$row["MATCH_ID"]."\">edit</a>"."</td>";
    echo "<td>"."<a href=\"delete_match.php?match_id=".$row["MATCH_ID"]."\">delete</a>"."</td>";
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
