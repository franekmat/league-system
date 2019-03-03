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
  <form action='add_team2.php' method='post' style="background-color:#efefef">
      <fieldset>
          <legend><b>Create new team</b></legend>
    <br>Team name: <input type='text' name='team_name' /><br />
	<br>League: <?php require 'snippets/league_select_list.php' ?><br />
    <br><br>
	<input type='Submit' name="send" value="Submit">
</fieldset>
  </form>
  <br>
  <br>
  <a href = "team.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
