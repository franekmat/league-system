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
  <form action='add_match2.php' method='post' style="background-color:#efefef">
      <fieldset>
          <legend><b>Create new match</b></legend>
    <br>Round: <input type='number' name='match_round' /><br />
    <br>Home team: <?php require 'snippets/home_team_select_list.php' ?><br />
    <br>Away team: <?php require 'snippets/away_team_select_list.php' ?><br />
    <br>Home team goals: <input type='number' name='match_home_team_goals' /><br />
    <br>Away team goals: <input type='number' name='match_away_team_goals' /><br />
	<br>Stadium: <?php require 'snippets/stadium_select_list.php' ?><br />
    <br><br>
	<input type='Submit' name="send" value="Submit">
</fieldset>
  </form>
  <br>
  <br>
  <a href = "match.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
