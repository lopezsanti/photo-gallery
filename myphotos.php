<?php
  session_start();

  //Get the contents from the JSON configuration file for authentication and photo directory Location
  $myconfig = file_get_contents("myconfig.js");

  // parse the JSON string to retrieve the contents in an array
  $myenv = json_decode($myconfig, true);

  if ($_POST['fname'] == $myenv['USERNAME'] && $_POST['pswd'] == $myenv['PSWD'] && $_SESSION['authorized'] == true )
  {
  $dir = './' . $myenv['PHOTO_DIR'];
  $myphotos = scandir($dir);
  $myfilecount = count($myphotos);
 ?>
 <!DOCTYPE html>
  <html>
    <head>
      <link rel="stylesheet" type="text/css" href="styles/photostyle.css">
      <script>
        var modal = document.getElementById("myModal");

        function myBigPhoto(photo){
          var modal = document.getElementById("myModal");
          var img = document.getElementById(photo);
          var modalImg = document.getElementById("img01");
          modal.style.display = "block";
          modalImg.src = img.src;
        }

        //var span = document.getElementsByClassName("close")[0];
        function myDisplay() {
          var modal = document.getElementById("myModal");
          modal.style.display = "none";
        }
      </script>
    </head>
      <title>My Pictures</title>
    </head>
    <body style="background-color: #A8A8A8;">
      <div class="mytitle">
        <span class="mytitle">PILARGRAM</span>
      </div>
      <!-- The modal image -->
      <div id="myModal" class="modal">
        <span id ="myclose" class="close" onclick="myDisplay()">x</span>
        <img class="modal-content" id="img01"/>
      </div>

      <!--This is the mainframe for all images -->
      <div class="mainframe">
      <table>
      <?php
        $counter = 1;
        echo '<tr>';
        for ($x = 2; $x < $myfilecount; $x++){
          if ($counter <= 4) {
            echo '<td class="thumb"><img id="myImg' . $x . '" class = "mythumb" src ="' . $myenv[PHOTO_DIR] . '/' . $myphotos[$x] . '" onclick = "myBigPhoto(\'myImg' . $x . '\')"/></td>';
            $counter++;
          }
          else {
            echo '<td class="thumb"><img id="myImg' .$x . '" class = "mythumb" src ="' . $myenv[PHOTO_DIR] . '/' . $myphotos[$x] . '" onclick = "myBigPhoto(\'myImg' . $x . '\')"/></td>';
            echo '<tr>';
            echo '<tr>';
            $counter = 1;
          }
        }
        echo '</tr>';
        ?>
      </table>
      </div>
    </body>
  </html>
<?php
}
else {
  header('Location: http://localhost:9090/mylogin.php');
}
 ?>
