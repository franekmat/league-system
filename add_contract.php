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

  <?php require 'login.php' ?>
<br><br><center>
  <form action='add_contract2.php' method='post' style="background-color:#efefef">
      <fieldset>
          <legend><b>Create new contract</b></legend>
    <br>Player: <?php require 'snippets/player_select_list.php' ?><br />
	<br>Team: <?php require 'snippets/team_select_list.php' ?><br />
    <br>Start date: <input type='date' name='contract_start_date' /><br />
    <br>Expiration date: <input type='date' name='contract_expiration_date' /><br />
    <br><br>
	<input type='Submit' name="send" value="Submit">
</fieldset>
  </form>
  <br>
  <br>
  <a href = "contract.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
