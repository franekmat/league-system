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
<a href='add_contract.php'><img src = "bt_add_contract.gif"></a>
<br><br>
<table border="1">
	<tr>
        <!-- <th>id</th> -->
        <th>player name</th>
        <th>surname</th>
		<th>team</th>
        <th>start date</th>
        <th>expiration date</th>
        <th>edit</th>
        <th>delete</th>
	</tr>

<?php

$r = oci_parse($conn, "SELECT player.player_name, player.player_surname, team.team_name, contract.contract_start_date,
               contract.contract_id, contract.contract_expiration_date FROM player, team, contract
               WHERE team.team_id = contract.team_id AND player.player_id = contract.player_id
               ORDER BY team.team_name");
oci_execute($r);
$rowCount = oci_fetch_all($r, $all, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

foreach ($all as $i => $row) {
	echo "<tr>";
	// echo "<td>".$row["PLAYER_ID"]."</td>";
	echo "<td>".$row["PLAYER_NAME"]."</td>";
    echo "<td>".$row["PLAYER_SURNAME"]."</td>";
	echo "<td>".$row["TEAM_NAME"]."</td>";
	echo "<td>".$row["CONTRACT_START_DATE"]."</td>";
	echo "<td>".$row["CONTRACT_EXPIRATION_DATE"]."</td>";
    echo "<td>"."<a href=\"update_contract.php?contract_id=".$row["CONTRACT_ID"]."\">edit</a>"."</td>";
    echo "<td>"."<a href=\"delete_contract.php?contract_id=".$row["CONTRACT_ID"]."\">delete</a>"."</td>";
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
