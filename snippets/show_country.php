<html>
<head>
    <style>
    html {
        background-image: url(bg.jpg);
        background-position: : center center;
        background-repeat: : no-repeat;
        background-attachment: : fixed;
        background-size: cover;
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

<?php require 'login.php'
?>

<br><br>
<br><br>
<table border="1">
	<tr>
        <th>league name</th>
		<th>country</th>
        <th>level</th>
	</tr>

<?php

$r = oci_parse($conn, "SELECT league.league_id, league.league_name, league.league_country,
               league.league_level FROM league WHERE league.league_country = :league_country
               ORDER BY league.league_country");
oci_bind_by_name($r, ":league_country", $_POST['league_country']);
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach ($all as $i => $row) {
	echo "<tr>";
	echo "<td>".$row["LEAGUE_NAME"]."</td>";
	echo "<td>".$row["LEAGUE_COUNTRY"]."</td>";
	echo "<td>".$row["LEAGUE_LEVEL"]."</td>";
	echo "</tr>";
}

?>

	</table>

    <br>
    <br>
    <a href = "search.php"><img src = "bt_return.gif"></a>

</center>
  </body>
</html>
