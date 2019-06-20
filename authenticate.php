<?php
session_start();

// -------------------------------------------------------------------------------
// Tests if the guest is logged in (the session variable gets set when a user gets 
// authenticated during the login process):
// -------------------------------------------------------------------------------

if(!isset($_SESSION['username'])) 
{
	header("Location: login.php");
}
?>