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
  <form action='add_player2.php' method='post' style="background-color:#efefef">
      <fieldset>
          <legend><b>Create new player</b></legend>
    <br>Name: <input type='text' name='player_name' /><br />
    <br>Surname: <input type='text' name='player_surname' /><br />
    <br>Position: <input type='text' name='player_position' /><br />
	<br>Team: <?php require 'snippets/team_select_list.php' ?><br />
    <br><br>
	<input type='Submit' name="send" value="Submit">
</fieldset>
  </form>
  <br>
  <br>
  <a href = "player.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
