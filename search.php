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
  <form action='show_team.php' method='post' style="background-color:#efefef">
      <fieldset>
          <legend><b>Search players from team</b></legend>
	<br>Team name: <?php require 'snippets/team_select_list.php' ?><br />
    <br><br>
	<input type='Submit' name="send" value="Submit">
</fieldset>
  </form>
  <form action='show_league.php' method='post' style="background-color:#efefef">
      <fieldset>
          <legend><b>Search teams from league</b></legend>
	<br>League name: <?php require 'snippets/league_select_list.php' ?><br />
    <br><br>
	<input type='Submit' name="send" value="Submit">
</fieldset>
  </form>
  <form action='show_country.php' method='post' style="background-color:#efefef">
      <fieldset>
          <legend><b>Search leagues from country</b></legend>
	<br>Country: <?php require 'snippets/country_select_list.php' ?><br />
    <br><br>
	<input type='Submit' name="send" value="Submit">
</fieldset>
  </form>
  <a href = "index.html"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
