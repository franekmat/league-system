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

<a href = "add_league.php"><img src = "bt_add_league.gif"></a>

<br><br>

<table border="1">
	<tr>
        <th>league name</th>
		<th>country</th>
        <th>level</th>
        <th>edit</th>
        <th>delete</th>
	</tr>

<?php

$r = oci_parse($conn, "SELECT league.league_id, league.league_name, league.league_country,
               league.league_level FROM league ORDER BY league.league_country");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach ($all as $i => $row) {
	echo "<tr>";
	echo "<td>".$row["LEAGUE_NAME"]."</td>";
	echo "<td>".$row["LEAGUE_COUNTRY"]."</td>";
	echo "<td>".$row["LEAGUE_LEVEL"]."</td>";
    echo "<td>"."<a href=\"update_league.php?league_id=".$row["LEAGUE_ID"]."\">edit</a>"."</td>";
    echo "<td>"."<a href=\"delete_league.php?league_id=".$row["LEAGUE_ID"]."\">delete</a>"."</td>";
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
