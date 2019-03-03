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
  <form action='add_stadium2.php' method='post' style="background-color:#efefef">
      <fieldset>
          <legend><b>Create new stadium</b></legend>
    <br>Name: <input type='text' name='stadium_name' /><br />
    <br>Capacity: <input type='number' name='stadium_capacity' /><br />
    <br>Attendance record: <input type='number' name='stadium_attendance_record' /><br />
    <br><br>
	<input type='Submit' name="send" value="Submit">
</fieldset>
  </form>
  <br>
  <br>
  <a href = "stadium.php"><img src = "bt_return.gif"></a>
</center>
  </body>
</html>
