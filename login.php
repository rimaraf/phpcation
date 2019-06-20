<?php
session_start();
require_once('db.php');

// ----------------------------------------------------------------
// If the user dosen't exsist in the DB or the username/password is
// wrong, this error page will be called. No details are given
// since we want to give away as little secrets as possible:
// ----------------------------------------------------------------

function youShallNotPass()
{
	?>
    		<!DOCTYPE html>
			<html>
			<link rel="stylesheet" href="css/style.css" />
			<body>
				<div class="you_shall_not_pass">
					<h3 id="not_pass_h3">You shall not pass!</h3>
		    		<br>
		    		<p id="not_pass_p"><a href='login.php'>Try again?</a></p>
		    	</div>
		    </body>
		    </html>
	<?php
}

// --------------------------------------------------------------------
// Tests if the username in the login form has been set with an input.
// If that's not the case (which is the default because the page hasn't 
// been generated yet), the page will be generated in the else-part:
// --------------------------------------------------------------------

if (isset($_POST['username']))
{																
	$username = stripslashes($_POST['username']); 				
	$username = mysqli_real_escape_string($db_con,$username);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($db_con,$password);

	// ----------------------------------------------------------------------
	// This part tests if the entered user credentials is legit.
	// If the search in the DB returns a row, the user name exists and the
	// entered password gets verified with the stored one. If they match, the 
	// user gets authenticated by setting a session variable:
	// ----------------------------------------------------------------------

    $query = "SELECT password FROM users WHERE username='$username'"; 
    
	$query_result = mysqli_query($db_con,$query) or die(mysql_error());
	$rows_count = mysqli_num_rows($query_result);
	
    if($rows_count==1)												
    {
    	$pwhash_from_db = mysqli_fetch_array($query_result);
    	
    	if (password_verify($password, $pwhash_from_db['password']))
    	{
    		$_SESSION['username'] = $username;						
	    	header("Location: index.php");
	    	exit;	
    	}
    	else
    	{	
    		youShallNotPass();
    	}																					
    }
    
    else
    {
    	youShallNotPass();
	}
}
else 															
{

// ---------------
// The login form:
// ---------------

?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css" />
	</head>

	<body>
	<div class="login_reg_form">
		<h1 class="login_reg_h1">Login</h1>
			<form method="post" name="login">
				<input type="text" name="username" placeholder="Username" required maxlength="20"/>
				<input type="password" name="password" placeholder="Password" required minlength="6"/>
				<input type="submit" name="submit" value="Login"/>
			</form>
			<br>
			<p class="login_reg_p">Don't have an account yet? <a href='registration.php'>Register here!</a></p>
	</div>

	</body>
	</html>

<?php 
} 
?>