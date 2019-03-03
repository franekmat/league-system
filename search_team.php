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
  <br>
  <br>
  <a href = "search.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
