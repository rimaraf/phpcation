<?php
session_start();

/*------------------------------------ 
/* Destroys the session and cookies:
/*----------------------------------*/

$_SESSION = array();
setcookie(session_name(), '', time() - 25920000, '/');
session_destroy();

header("Location: login.php");
?>