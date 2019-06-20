<?php
require_once ("config.php");

// -------------------------------------
// Establish connection to the database:
// -------------------------------------

$db_con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

// ---------------------------------------------------------------
// Displays an error message if unable to connect to the database:
// ---------------------------------------------------------------

if (mysqli_connect_errno())
{
	echo "<h3>There were problems connection to the database: " . mysqli_connect_error() . "</h3>";
}
?>