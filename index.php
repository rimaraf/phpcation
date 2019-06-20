<?php
require_once("authenticate.php");
?>

<!--
The protected webpage - change it to whatever you need! 
-->

<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Your homepage</title>
  </head>

  <body>   
    <div class="welcome">
      <h3>Welcome to your login-protected webpage!</h3>
      <br>
      <div id="logout">
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </body>

</html>