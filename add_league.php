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
  <form action='add_league2.php' method='post' style="background-color:#efefef">
     <fieldset>
        <legend><b>Create new league</b></legend>
        <br>League name: <input type='text' name='league_name' /><br />
        <br>Country: <input type='text' name='league_country' /><br />
        <br>Level: <input type='number' name='league_level' /><br />
        <br><br>
    	<input type='Submit' name="send" value="Submit">
    </fieldset>
  </form>
  <br>
  <br>
  <a href = "league.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
