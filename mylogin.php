<?php
  session_start();
  $_SESSION["authorized"] = true;
 ?>
 <html>
  <head>
    <link rel="stylesheet" type="text/css" href="styles/photostyle.css">
  </head>
  <body style="background-color: #888888;">
    <div class="mylogin">
      <form action = "myphotos.php" method="post">
        <label for="fname">Name</label>
        <input type="text" id="fname" name="fname"/>
        <label for="pswd">Password</label>
        <input type="password" id="pswd" name = "pswd"/>
        <input type="submit"/>
      </form>
    </div>
  </body>
</html>
